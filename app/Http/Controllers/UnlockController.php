<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Unlock;
use App\Models\Payment;
use App\Models\PlatformSetting;
use App\Models\Notification;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UnlockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function initiate(Property $property)
    {
        $user = auth()->user();

        if (!$property->isAvailable()) {
            return back()->with('error', 'This property is not available for unlock.');
        }

        if ($user->hasUnlocked($property)) {
            return redirect()->route('properties.show', $property)->with('info', 'You already unlocked this property.');
        }

        $unlockFee = PlatformSetting::get('unlock_fee', 1000);

        $payment = Payment::create([
            'user_id' => $user->id,
            'type' => 'unlock',
            'amount' => $unlockFee,
            'provider' => 'mpesa',
            'status' => 'pending',
            'metadata' => ['property_id' => $property->id],
        ]);

        return view('payment.initiate', compact('property', 'payment', 'unlockFee'));
    }

    public function process(Request $request, Property $property)
    {
        $request->validate([
            'provider' => 'required|in:mpesa,airtel_money,mixx_by_yas',
            'phone' => 'required|string',
            'payment_id' => 'required|exists:payments,id',
        ]);

        $payment = Payment::findOrFail($request->payment_id);

        if ($payment->user_id !== auth()->id()) {
            abort(403);
        }

        $payment->update([
            'provider' => $request->provider,
            'provider_transaction_id' => 'MOCK-' . strtoupper(Str::random(10)),
            'status' => 'completed',
            'paid_at' => now(),
            'receipt_number' => 'UNL-' . date('Y') . '-' . str_pad($payment->id, 6, '0', STR_PAD_LEFT),
        ]);

        $unlock = Unlock::create([
            'user_id' => auth()->id(),
            'property_id' => $property->id,
            'payment_id' => $payment->id,
            'receipt_number' => $payment->receipt_number,
            'amount_paid' => $payment->amount,
            'unlocked_at' => now(),
        ]);

        $property->increment('unlocks_count');

        Notification::create([
            'user_id' => $property->user_id,
            'type' => 'property_unlocked',
            'title' => 'Your listing was unlocked!',
            'body' => "A seeker has unlocked '{$property->title}' and may call you.",
            'data' => ['property_id' => $property->id, 'unlock_id' => $unlock->id],
        ]);

        AuditLog::log('unlock_completed', 'unlock', "Unlocked property: {$property->title}");

        return view('payment.success', compact('property', 'payment', 'unlock'));
    }
}
