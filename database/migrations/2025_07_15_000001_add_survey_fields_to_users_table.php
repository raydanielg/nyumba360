<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('tenant')->after('password');
            $table->string('phone')->nullable()->after('role');
            $table->string('region')->nullable()->after('phone');
            $table->string('district')->nullable()->after('region');
            $table->string('property_type_preference')->nullable()->after('district');
            $table->string('budget_range')->nullable()->after('property_type_preference');
            $table->text('bio')->nullable()->after('budget_range');
            $table->json('preferred_wards')->nullable()->after('bio');
            $table->integer('min_rooms')->nullable()->after('preferred_wards');
            $table->string('move_timeline')->nullable()->after('min_rooms');
            $table->json('priorities')->nullable()->after('move_timeline');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone', 'region', 'district', 'property_type_preference', 'budget_range', 'bio', 'preferred_wards', 'min_rooms', 'move_timeline', 'priorities']);
        });
    }
};
