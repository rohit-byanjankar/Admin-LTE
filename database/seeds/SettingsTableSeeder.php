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
                        'id' => 1,
                        'key' => 'CM_title',
                        'value' => 'Community Media',
                    ],
                    [
                        'id' => 2,
                        'key' => 'CM_Description',
                        'value' => 'This is our vision',
                    ],
                    [
                        'id' => 3,
                        'key' => 'CM_address',
                        'value' => 'Community Media',
                    ],
                    [
                        'id' => 4,
                        'key' => 'CM_phone_number',
                        'value' => '9860300808',
                    ]

                ];
            DB::table('settings')->insert($settings);
        }
    }
}
