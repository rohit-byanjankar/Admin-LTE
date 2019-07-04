<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
            $users =
                [
                    [
                        'name' => 'saman shakya',
                        'email' => 'samanshakya01@gmail.com',
                        'password' => Hash::make('k0nk@12345'),
                        'role' => 'admin',
                        'about' => 'Student',
                        'image' => '-',
                        'phone_number' => '9860300808',
                        'address' => 'ombahal',
                        'verify' => '1'
                    ],
                    [
                        'name' => 'rohit byanjan',
                        'email' => 'rohitbenz09@gmail.com',
                        'password' => Hash::make('redskull'),
                        'role' => 'admin',
                        'about' => 'Student',
                        'image' => '-',
                        'phone_number' => '9860300808',
                        'address' => 'ombahal',
                        'verify' => '1'
                    ]
                ];
            DB::table('users')->insert($users);
        
    }
}
