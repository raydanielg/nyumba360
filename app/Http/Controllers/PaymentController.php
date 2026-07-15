<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\BrokerPass;
use App\Models\LandlordSubscription;
use App\Models\PlatformSetting;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function brokerPass()
    {
        $user = auth()->user();
        if (!$user->isBroker()) {
            abort(403);
        }

        $price = PlatformSetting::get('broker_pass_price', 5000);
        $durationDays = PlatformSetting::get('broker_pass_duration_days', 7);
        $activePass = $user->activeBrokerPass;

        return view('payment.broker-pass', compact('price', 'durationDays', 'activePass'));
    }

    public function processBrokerPass(Request $request)
    {
        $request->validate([
            'provider' => 'required|in:mpesa,airtel_money,mixx_by_yas',
            'phone' => 'required|string',
        ]);

        $user = auth()->user();
        $price = PlatformSetting::get('broker_pass_price', 5000);
        $durationDays = PlatformSetting::get('broker_pass_duration_days', 7);

        $payment = Payment::create([
            'user_id' => $user->id,
            'type' => 'broker_pass',
            'amount' => $price,
            'provider' => $request->provider,
            'provider_transaction_id' => 'MOCK-' . strtoupper(Str::random(10)),
            'status' => 'completed',
            'paid_at' => now(),
            'receipt_number' => 'BP-' . date('Y') . '-' . str_pad(Payment::max('id') + 1, 6, '0', STR_PAD_LEFT),
        ]);

        $startsAt = now();
        $activePass = $user->activeBrokerPass;
        if ($activePass && $activePass->expires_at > now()) {
            $startsAt = $activePass->expires_at;
        }

        BrokerPass::create([
            'user_id' => $user->id,
            'payment_id' => $payment->id,
            'starts_at' => $startsAt,
            'expires_at' => $startsAt->copy()->addDays($durationDays),
            'status' => 'active',
        ]);

        AuditLog::log('broker_pass_purchased', 'payment', "Broker pass purchased: {$price} TZS");

        return redirect()->route('dashboard')->with('success', 'Broker pass activated! You can now list properties.');
    }

    public function landlordPlans()
    {
        $user = auth()->user();
        if (!$user->isLandlord()) {
            abort(403);
        }

        $plans = [
            'starter' => [
                'name' => 'Starter',
                'price' => PlatformSetting::get('plan_starter_price', 10000),
                'listings' => PlatformSetting::get('plan_starter_listings', 3),
                'featured' => 0,
            ],
            'growth' => [
                'name' => 'Growth',
                'price' => PlatformSetting::get('plan_growth_price', 25000),
                'listings' => PlatformSetting::get('plan_growth_listings', 10),
                'featured' => PlatformSetting::get('plan_growth_featured', 1),
            ],
            'portfolio' => [
                'name' => 'Portfolio',
                'price' => PlatformSetting::get('plan_portfolio_price', 60000),
                'listings' => PlatformSetting::get('plan_portfolio_listings', 30),
                'featured' => PlatformSetting::get('plan_portfolio_featured', 3),
            ],
            'estate' => [
                'name' => 'Estate',
                'price' => PlatformSetting::get('plan_estate_price', 150000),
                'listings' => 999999,
                'featured' => PlatformSetting::get('plan_estate_featured', 10),
            ],
        ];

        $activeSub = $user->activeSubscription;

        return view('payment.landlord-plans', compact('plans', 'activeSub'));
    }

    public function processLandlordPlan(Request $request)
    {
        $request->validate([
            'plan' => 'required|in:starter,growth,portfolio,estate',
            'provider' => 'required|in:mpesa,airtel_money,mixx_by_yas',
            'phone' => 'required|string',
        ]);

        $user = auth()->user();
        $planKey = $request->plan;

        $plans = [
            'starter' => ['name' => 'Starter', 'price' => PlatformSetting::get('plan_starter_price', 10000), 'listings' => PlatformSetting::get('plan_starter_listings', 3), 'featured' => 0],
            'growth' => ['name' => 'Growth', 'price' => PlatformSetting::get('plan_growth_price', 25000), 'listings' => PlatformSetting::get('plan_growth_listings', 10), 'featured' => PlatformSetting::get('plan_growth_featured', 1)],
            'portfolio' => ['name' => 'Portfolio', 'price' => PlatformSetting::get('plan_portfolio_price', 60000), 'listings' => PlatformSetting::get('plan_portfolio_listings', 30), 'featured' => PlatformSetting::get('plan_portfolio_featured', 3)],
            'estate' => ['name' => 'Estate', 'price' => PlatformSetting::get('plan_estate_price', 150000), 'listings' => 999999, 'featured' => PlatformSetting::get('plan_estate_featured', 10)],
        ];

        $plan = $plans[$planKey];

        $payment = Payment::create([
            'user_id' => $user->id,
            'type' => 'landlord_plan',
            'amount' => $plan['price'],
            'provider' => $request->provider,
            'provider_transaction_id' => 'MOCK-' . strtoupper(Str::random(10)),
            'status' => 'completed',
            'paid_at' => now(),
            'receipt_number' => 'LP-' . date('Y') . '-' . str_pad(Payment::max('id') + 1, 6, '0', STR_PAD_LEFT),
            'metadata' => ['plan' => $planKey],
        ]);

        LandlordSubscription::create([
            'user_id' => $user->id,
            'payment_id' => $payment->id,
            'plan_name' => $plan['name'],
            'amount' => $plan['price'],
            'listing_limit' => $plan['listings'],
            'featured_slots' => $plan['featured'],
            'starts_at' => now(),
            'expires_at' => now()->addMonth(),
            'status' => 'active',
        ]);

        AuditLog::log('landlord_plan_purchased', 'payment', "Subscribed to {$plan['name']} plan: {$plan['price']} TZS");

        return redirect()->route('dashboard')->with('success', "{$plan['name']} plan activated! You can now list properties.");
    }

    public function history()
    {
        $payments = Payment::where('user_id', auth()->id())->latest()->paginate(20);
        return view('payment.history', compact('payments'));
    }
}
