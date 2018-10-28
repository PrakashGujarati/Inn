<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
         * Add Permissions
         *
         */
        Permission::create([
                'hotelcode'   => '123456',
                'name'        => 'Can View Permission',
                'slug'        => 'permissions.index',
                'description' => 'Can view Permission',
                'model'       => 'Permission',
            ]);

        Permission::create([
                'hotelcode'   => '123456',
                'name'        => 'Can create Permission',
                'slug'        => 'permissions.create',
                'description' => 'Can create Permission',
                'model'       => 'Permission',
            ]);

        Permission::create([
                'hotelcode'   => '123456',
                'name'        => 'Can edit Permission',
                'slug'        => 'permissions.edit',
                'description' => 'Can edit Permission',
                'model'       => 'Permission',
            ]);

        Permission::create([
                'hotelcode'   => '123456',
                'name'        => 'Can destroy Permission',
                'slug'        => 'permissions.destroy',
                'description' => 'Can destroy Permission',
                'model'       => 'Permission',
            ]);

        

        
    }
}
