<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Payment;
use App\Models\Unlock;
use App\Models\KycDocument;
use App\Models\BrokerPass;
use App\Models\LandlordSubscription;
use App\Models\PlatformSetting;
use App\Models\Notification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        return match ($user->role) {
            'admin' => $this->adminDashboard(),
            'landlord' => $this->landlordDashboard(),
            'broker' => $this->brokerDashboard(),
            default => $this->seekerDashboard(),
        };
    }

    private function adminDashboard()
    {
        $stats = [
            'total_revenue' => Payment::where('status', 'completed')->sum('amount'),
            'unlock_revenue' => Payment::where('status', 'completed')->where('type', 'unlock')->sum('amount'),
            'broker_revenue' => Payment::where('status', 'completed')->where('type', 'broker_pass')->sum('amount'),
            'landlord_revenue' => Payment::where('status', 'completed')->where('type', 'landlord_plan')->sum('amount'),
            'total_properties' => Property::count(),
            'pending_approvals' => Property::where('approval_status', 'pending')->count(),
            'pending_kyc' => KycDocument::where('status', 'pending')->count(),
            'total_users' => \App\Models\User::count(),
            'total_unlocks' => Unlock::count(),
            'active_brokers' => BrokerPass::where('status', 'active')->where('expires_at', '>', now())->count(),
            'active_subscriptions' => LandlordSubscription::where('status', 'active')->where('expires_at', '>', now())->count(),
        ];

        $recentPayments = Payment::with('user')->latest()->limit(10)->get();
        $pendingProperties = Property::with('user')->where('approval_status', 'pending')->latest()->limit(10)->get();
        $pendingKyc = KycDocument::with('user')->where('status', 'pending')->latest()->limit(10)->get();

        return view('dashboard.admin', compact('stats', 'recentPayments', 'pendingProperties', 'pendingKyc'));
    }

    private function landlordDashboard()
    {
        $user = auth()->user();
        $properties = Property::where('user_id', $user->id)->with('images')->latest()->get();
        $subscription = $user->activeSubscription;
        $totalUnlocks = Unlock::whereIn('property_id', $properties->pluck('id'))->count();
        $totalViews = $properties->sum('views_count');
        $totalRevenue = Payment::where('status', 'completed')->where('type', 'unlock')->count();

        return view('dashboard.landlord', compact('properties', 'subscription', 'totalUnlocks', 'totalViews'));
    }

    private function brokerDashboard()
    {
        $user = auth()->user();
        $properties = Property::where('user_id', $user->id)->with('images')->latest()->get();
        $brokerPass = $user->activeBrokerPass;
        $totalUnlocks = Unlock::whereIn('property_id', $properties->pluck('id'))->count();
        $totalViews = $properties->sum('views_count');

        return view('dashboard.broker', compact('properties', 'brokerPass', 'totalUnlocks', 'totalViews'));
    }

    private function seekerDashboard()
    {
        $user = auth()->user();
        $unlocks = Unlock::with('property.images')->where('user_id', $user->id)->latest()->get();
        $favorites = \App\Models\Favorite::with('property.images')->where('user_id', $user->id)->latest()->get();
        $payments = Payment::where('user_id', $user->id)->latest()->limit(10)->get();
        $notifications = Notification::where('user_id', $user->id)->latest()->limit(5)->get();

        return view('dashboard.seeker', compact('unlocks', 'favorites', 'payments', 'notifications'));
    }
}
