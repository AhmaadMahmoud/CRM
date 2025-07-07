<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name'=>'Admin']);
        $adminRole->givePermissionTo(['users.create', 'users.edit', 'users.delete']);
        Role::create(['name'=>'User']);
    }
}
