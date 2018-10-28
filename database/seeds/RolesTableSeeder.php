<?php


use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Roles
         *
         */
        if (Role::where('name', '=', 'Admin')->first() === null) {
            $adminRole = Role::create([
                'hotelcode'  => '123456',
                'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => 'Admin Role',
                'level'       => 5,
            ]);
        }

        if (Role::where('name', '=', 'User')->first() === null) {
            $userRole = Role::create([
                'hotelcode'  => '123456',
                'name'        => 'User',
                'slug'        => 'user',
                'description' => 'User Role',
                'level'       => 1,
            ]);
        }
    }
}
