<?php

use Illuminate\Database\Seeder;
use Modules\UserRoles\Entities\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::all()->count() < 1) {
            $roles =
                [
                    [
                        'name' => 'superadmin'
                    ],
                    [
                        'name' => 'admin'
                    ],
                    [
                        'name' => 'writer'
                    ],


                ];
            DB::table('roles')->insert($roles);
        }
    }
}
