<?php

namespace Vendor\UltimateStarterKit\Database\Seeders;

use Illuminate\Database\Seeder;
use Vendor\UltimateStarterKit\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'Ultimate Starter Kit',
                'type' => 'string',
                'description' => 'The name of your application.'
            ],
            [
                'key' => 'site_description',
                'value' => 'The ultimate starter kit for your next big idea.',
                'type' => 'string',
                'description' => 'A brief description of your site.'
            ],
            [
                'key' => 'support_email',
                'value' => 'support@example.com',
                'type' => 'string',
                'description' => 'Email address for support inquiries.'
            ],
            [
                'key' => 'maintenance_mode',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'Toggle maintenance mode on or off.'
            ],
            [
                'key' => 'registration_enabled',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Allow new users to register.'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
