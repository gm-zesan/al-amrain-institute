<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Zesan',
            'email' => 'zesan.bitscol7767@gmail.com',
            'password' => bcrypt('12345678aA'),
        ]);
        $admin = User::create([
            'name' => 'Al Amrain Institute',
            'email' => 'alamrain@gmail.com',
            'password' => bcrypt('alamrain24'),
            'image' => 'upload/all-user/20241023081527.png',
        ]);
        $student = User::create([
            'name' => 'Student - 1',
            'email' => 'student1@gmail.com',
            'password' => bcrypt('12345678aA'),
        ]);

        $permissions = Permission::pluck('id','name')->all();
        $permissionsAdmin = Permission::whereNotIn('name', ['commontype-list', 'commontype-create', 'commontype-edit', 'commontype-delete','user-list', 'user-create', 'user-edit', 'user-delete','role-list', 'role-create', 'role-edit', 'role-delete'])->pluck('id','name')->all();

        $user->assignRole('superadmin');
        $admin->assignRole('admin');
        $student->assignRole('student');

        // superadmin
        $superAdminRole = Role::findByName('superadmin');
        $superAdminRole->givePermissionTo($permissions);
        // admin
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo($permissionsAdmin);

    }
}
