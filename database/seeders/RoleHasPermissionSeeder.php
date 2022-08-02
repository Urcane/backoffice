<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $administrator = Role::findByName('Administrator');
        $hr = Role::findByName('HR');

        $administrator->givePermissionTo('user management');
        $administrator->givePermissionTo('groups management');
        $administrator->givePermissionTo('member management');

        $hr->givePermissionTo('groups management');
        $hr->givePermissionTo('member management');
    }
}
