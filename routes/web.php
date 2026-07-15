<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnlockController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KycController;
use App\Http\Controllers\AdminController;
use App\Models\Property;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Auth::routes();

Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'showSuccess'])->name('register.success');

// Property browsing (public)
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/property/{property}', [PropertyController::class, 'show'])->name('properties.show');

// Category page
Route::get('/category/{category}', function ($category) {
    $typeMap = [
        'houses' => ['full_house'],
        'apartments' => ['apartment'],
        'studios' => ['single_room', 'self_contained'],
        'maisonettes' => ['maisonette'],
        'commercial' => ['commercial'],
        'office' => ['office'],
        'shops' => ['shop'],
        'hostels' => ['single_room'],
        'warehouse' => ['warehouse'],
        'land' => ['land'],
    ];

    $types = $typeMap[$category] ?? [];
    $properties = Property::with('images', 'user')
        ->where('approval_status', 'approved')
        ->where('status', 'available')
        ->when($types, fn($q) => $q->whereIn('type', $types))
        ->latest()
        ->paginate(24);

    return view('category', compact('category', 'properties'));
})->name('category');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Property CRUD (landlord & broker)
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::post('/properties/{property}/favorite', [PropertyController::class, 'toggleFavorite'])->name('properties.favorite');

    // Unlock flow
    Route::get('/properties/{property}/unlock', [UnlockController::class, 'initiate'])->name('unlock.initiate');
    Route::post('/properties/{property}/unlock', [UnlockController::class, 'process'])->name('unlock.process');

    // KYC
    Route::get('/kyc', [KycController::class, 'create'])->name('kyc.create');
    Route::post('/kyc', [KycController::class, 'store'])->name('kyc.store');

    // Payments
    Route::get('/payments/broker-pass', [PaymentController::class, 'brokerPass'])->name('payment.broker-pass');
    Route::post('/payments/broker-pass', [PaymentController::class, 'processBrokerPass'])->name('payment.broker-pass.process');
    Route::get('/payments/landlord-plans', [PaymentController::class, 'landlordPlans'])->name('payment.landlord-plans');
    Route::post('/payments/landlord-plans', [PaymentController::class, 'processLandlordPlan'])->name('payment.landlord-plans.process');
    Route::get('/payments/history', [PaymentController::class, 'history'])->name('payment.history');

    // Admin routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/properties/pending', [AdminController::class, 'pendingProperties'])->name('properties.pending');
        Route::post('/properties/{property}/approve', [AdminController::class, 'approveProperty'])->name('properties.approve');
        Route::post('/properties/{property}/reject', [AdminController::class, 'rejectProperty'])->name('properties.reject');
        Route::get('/kyc/pending', [AdminController::class, 'pendingKyc'])->name('kyc.pending');
        Route::post('/kyc/{kyc}/approve', [AdminController::class, 'approveKyc'])->name('kyc.approve');
        Route::post('/kyc/{kyc}/reject', [AdminController::class, 'rejectKyc'])->name('kyc.reject');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
        Route::get('/revenue', [AdminController::class, 'revenue'])->name('revenue');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/audit', [AdminController::class, 'auditLog'])->name('audit');
    });
});
