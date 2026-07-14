<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlatformSetting;

class PlatformSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Unlock settings
            ['key' => 'unlock_fee', 'value' => '1000', 'group' => 'unlock'],
            ['key' => 'unlock_bundle_5_price', 'value' => '4000', 'group' => 'unlock'],
            ['key' => 'unlock_bundle_10_price', 'value' => '7500', 'group' => 'unlock'],
            ['key' => 'unlock_grace_hours', 'value' => '24', 'group' => 'unlock'],

            // Broker pass settings
            ['key' => 'broker_pass_price', 'value' => '5000', 'group' => 'broker'],
            ['key' => 'broker_pass_duration_days', 'value' => '7', 'group' => 'broker'],
            ['key' => 'broker_pass_grace_hours', 'value' => '24', 'group' => 'broker'],
            ['key' => 'broker_first_week_free', 'value' => '0', 'group' => 'broker'],

            // Landlord plan settings
            ['key' => 'plan_starter_price', 'value' => '10000', 'group' => 'landlord'],
            ['key' => 'plan_starter_listings', 'value' => '3', 'group' => 'landlord'],
            ['key' => 'plan_growth_price', 'value' => '25000', 'group' => 'landlord'],
            ['key' => 'plan_growth_listings', 'value' => '10', 'group' => 'landlord'],
            ['key' => 'plan_growth_featured', 'value' => '1', 'group' => 'landlord'],
            ['key' => 'plan_portfolio_price', 'value' => '60000', 'group' => 'landlord'],
            ['key' => 'plan_portfolio_listings', 'value' => '30', 'group' => 'landlord'],
            ['key' => 'plan_portfolio_featured', 'value' => '3', 'group' => 'landlord'],
            ['key' => 'plan_estate_price', 'value' => '150000', 'group' => 'landlord'],
            ['key' => 'plan_estate_listings', 'value' => '999999', 'group' => 'landlord'],
            ['key' => 'plan_estate_featured', 'value' => '10', 'group' => 'landlord'],
            ['key' => 'plan_free_enabled', 'value' => '1', 'group' => 'landlord'],
            ['key' => 'plan_free_listings', 'value' => '1', 'group' => 'landlord'],

            // Listing settings
            ['key' => 'featured_listing_price', 'value' => '5000', 'group' => 'listing'],
            ['key' => 'freshness_nudge_days', 'value' => '14', 'group' => 'listing'],
            ['key' => 'auto_archive_days', 'value' => '30', 'group' => 'listing'],

            // General
            ['key' => 'site_name', 'value' => 'Nyumba360', 'group' => 'general'],
            ['key' => 'currency', 'value' => 'TZS', 'group' => 'general'],
            ['key' => 'support_phone', 'value' => '+255712345678', 'group' => 'general'],
            ['key' => 'support_email', 'value' => 'info@nyumba360.co.tz', 'group' => 'general'],
        ];

        foreach ($settings as $setting) {
            PlatformSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
