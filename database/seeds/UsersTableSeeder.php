<?php

use App\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', '=', 'Admin')->first();       

        $newUser = User::create([
                'name'     => 'administrator',
                'username'    => 'admin',
                'hotelcode'    => '123456',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('secret'),
                'role_id' => 1,
            ]);
        /*
         * Add Users
         *
         */
        $newUser->attachRole($adminRole);       
    }
}
