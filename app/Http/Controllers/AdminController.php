<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\KycDocument;
use App\Models\PlatformSetting;
use App\Models\Payment;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function pendingProperties()
    {
        $properties = Property::with('user', 'images')->where('approval_status', 'pending')->latest()->paginate(15);
        return view('admin.properties-pending', compact('properties'));
    }

    public function approveProperty(Property $property)
    {
        $property->update(['approval_status' => 'approved']);
        AuditLog::log('property_approved', 'admin', "Approved property: {$property->title}");
        return back()->with('success', 'Property approved.');
    }

    public function rejectProperty(Request $request, Property $property)
    {
        $property->update(['approval_status' => 'rejected']);
        AuditLog::log('property_rejected', 'admin', "Rejected property: {$property->title}");
        return back()->with('success', 'Property rejected.');
    }

    public function pendingKyc()
    {
        $kycs = KycDocument::with('user')->where('status', 'pending')->latest()->paginate(15);
        return view('admin.kyc-pending', compact('kycs'));
    }

    public function approveKyc(KycDocument $kyc)
    {
        $kyc->update([
            'status' => 'approved',
            'reviewed_at' => now(),
            'reviewed_by' => auth()->id(),
        ]);
        AuditLog::log('kyc_approved', 'admin', "KYC approved for user: {$kyc->user->name}");
        return back()->with('success', 'KYC approved.');
    }

    public function rejectKyc(Request $request, KycDocument $kyc)
    {
        $request->validate(['notes' => 'required|string']);
        $kyc->update([
            'status' => 'rejected',
            'admin_notes' => $request->notes,
            'reviewed_at' => now(),
            'reviewed_by' => auth()->id(),
        ]);
        AuditLog::log('kyc_rejected', 'admin', "KYC rejected for user: {$kyc->user->name}");
        return back()->with('success', 'KYC rejected.');
    }

    public function settings()
    {
        $settings = PlatformSetting::all()->groupBy('group');
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*' => 'required|string',
        ]);

        foreach ($validated['settings'] as $key => $value) {
            $old = PlatformSetting::get($key);
            PlatformSetting::set($key, $value);
            AuditLog::log('setting_updated', 'admin', "Updated setting {$key} from '{$old}' to '{$value}'", ['value' => $old], ['value' => $value]);
        }

        return back()->with('success', 'Settings updated successfully.');
    }

    public function revenue()
    {
        $totalRevenue = Payment::where('status', 'completed')->sum('amount');
        $unlockRevenue = Payment::where('status', 'completed')->where('type', 'unlock')->sum('amount');
        $brokerRevenue = Payment::where('status', 'completed')->where('type', 'broker_pass')->sum('amount');
        $landlordRevenue = Payment::where('status', 'completed')->where('type', 'landlord_plan')->sum('amount');

        $monthlyData = Payment::where('status', 'completed')
            ->selectRaw("strftime('%Y', paid_at) as year, strftime('%m', paid_at) as month, SUM(amount) as total, type")
            ->where('paid_at', '>=', now()->subMonths(12))
            ->groupBy('year', 'month', 'type')
            ->get();

        $recentPayments = Payment::with('user')->where('status', 'completed')->latest()->limit(20)->get();

        return view('admin.revenue', compact('totalRevenue', 'unlockRevenue', 'brokerRevenue', 'landlordRevenue', 'monthlyData', 'recentPayments'));
    }

    public function users()
    {
        $users = User::withCount('properties', 'unlocks', 'payments')->latest()->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function auditLog()
    {
        $logs = AuditLog::with('user')->latest()->paginate(30);
        return view('admin.audit', compact('logs'));
    }
}
