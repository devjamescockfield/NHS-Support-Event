<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \App\Role::create([
            'name' => 'Admin',
            'colour' => 'ffffff',
            'order' => '1'
        ]);

        \App\Role::create([
            'name' => 'Player',
            'colour' => 'ff0000',
            'order' => '2'
        ]);

        $perm1 = \App\Permission::create([
            'name' => 'Staff Dashboard',
        ]);

        $perm2 = \App\Permission::create([
            'name' => 'Update Feedback Ticket',
        ]);
        $perm3 = \App\Permission::create([
            'name' => 'Administer Contact Forms',
        ]);
        $perm4 = \App\Permission::create([
            'name' => 'View Feedback Tickets',
        ]);
        $perm5 = \App\Permission::create([
            'name' => 'Feedback Area',
        ]);
        $perm6 = \App\Permission::create([
            'name' => 'Manage Feedback',
        ]);
        $perm7 = \App\Permission::create([
            'name' => 'Administer Permissions',
        ]);
        $perm8 = \App\Permission::create([
            'name' => 'Administer Roles',
        ]);
        $perm9 = \App\Permission::create([
            'name' => 'Administer Users',
        ]);
        $perm10 = \App\Permission::create([
            'name' => 'Edit User Permissions',
        ]);

        $role->givePermissionTo($perm1);
        $role->givePermissionTo($perm2);
        $role->givePermissionTo($perm3);
        $role->givePermissionTo($perm4);
        $role->givePermissionTo($perm5);
        $role->givePermissionTo($perm6);
        $role->givePermissionTo($perm7);
        $role->givePermissionTo($perm8);
        $role->givePermissionTo($perm9);
        $role->givePermissionTo($perm10);
    }
}
