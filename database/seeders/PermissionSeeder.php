<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user management',
            'groups management',
            'member management',
        ];

        foreach ($permissions as $permission) {
            $p = Permission::create([
                'name' => $permission,
            ]);
        }
    }
}
