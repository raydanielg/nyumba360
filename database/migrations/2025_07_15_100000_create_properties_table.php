<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->enum('type', ['single_room', 'self_contained', 'apartment', 'full_house', 'maisonette', 'commercial', 'office', 'shop', 'warehouse', 'land']);
            $table->enum('status', ['available', 'taken', 'maintenance'])->default('available');
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('region');
            $table->string('district');
            $table->string('ward');
            $table->string('street')->nullable(); // hidden until unlock
            $table->decimal('latitude', 10, 7)->nullable(); // hidden until unlock
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('rent_amount', 12, 2);
            $table->decimal('deposit_amount', 12, 2)->nullable();
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->decimal('area_sqm', 8, 2)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamp('availability_confirmed_at')->nullable();
            $table->json('amenities')->nullable();
            $table->integer('views_count')->default(0);
            $table->integer('unlocks_count')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('property_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->string('caption')->nullable();
            $table->boolean('is_primary')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('property_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('video_path');
            $table->string('thumbnail_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_videos');
        Schema::dropIfExists('property_images');
        Schema::dropIfExists('properties');
    }
};
