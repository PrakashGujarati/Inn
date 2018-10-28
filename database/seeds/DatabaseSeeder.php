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

        $this->call('PermissionsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');        
        $this->call('ConnectRelationshipsSeeder');       

       Model::reguard();
    }
}
