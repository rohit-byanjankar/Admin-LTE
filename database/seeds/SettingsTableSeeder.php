<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        while (Settings::all()->count() < 1) {
            $settings =
                [
                    [
                        'key' => 'CM_title',
                        'value' => 'Chyasal Online',
                    ],
                    [
                        'key' => 'CM_Description',
                        'value' => 'This is our vision',
                    ],
                    [
                        'key' => 'CM_address',
                        'value' => 'Chyasal',
                    ],
                    [
                        'key' => 'CM_phone_number',
                        'value' => '9860300808',
                    ]
                ];
            DB::table('settings')->insert($settings);
        }
    }
}
