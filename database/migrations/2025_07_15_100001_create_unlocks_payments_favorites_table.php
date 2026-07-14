<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unlocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_id')->nullable()->constrained()->nullOnDelete();
            $table->string('receipt_number')->unique();
            $table->decimal('amount_paid', 12, 2);
            $table->timestamp('unlocked_at');
            $table->boolean('is_refunded')->default(false);
            $table->timestamps();
            $table->unique(['user_id', 'property_id']);
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['unlock', 'broker_pass', 'landlord_plan']);
            $table->string('reference')->unique();
            $table->string('receipt_number')->nullable();
            $table->decimal('amount', 12, 2);
            $table->enum('provider', ['mpesa', 'airtel_money', 'mixx_by_yas', 'manual']);
            $table->string('provider_transaction_id')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->json('metadata')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });

        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'property_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorites');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('unlocks');
    }
};
