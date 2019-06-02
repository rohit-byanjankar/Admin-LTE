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
        $user = User::where('email','samanshakya01@gmail.com')->first();

        if(!$user)
        {
            User::create([
                'name'=> 'saman shakya',
                'email'=> 'samanshakya01@gmail.com',
                'password'=> Hash::make('k0nk@12345'),
                'role'=>'admin'
            ]);
            
        }
    }
}
