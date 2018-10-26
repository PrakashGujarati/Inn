<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use jeremykenedy\LaravelRoles\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

       // $this->call('PermissionsTableSeeder');
       // $this->call('RolesTableSeeder');
        //$this->call('ConnectRelationshipsSeeder');

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

       Model::reguard();
    }
}
