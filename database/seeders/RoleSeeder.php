<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name'=>'admin']);
        $role2=Role::create(['name'=>'developer']);
        $role3=Role::create(['name'=>'guest']);
        Permission::create(['name'=>'admin'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.list_users'])->syncRoles($role1);
        Permission::create(['name'=>'admin.list_reservations'])->syncRoles([$role1,$role2,$role3]);
    }
}
