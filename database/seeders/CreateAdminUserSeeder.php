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
        $permissions = Permission::pluck('id','name')->all();
        $permissionsAdmin = Permission::whereNotIn('name', ['commontype-list', 'commontype-create', 'commontype-edit', 'commontype-delete','user-list', 'user-create', 'user-edit', 'user-delete','role-list', 'role-create', 'role-edit', 'role-delete'])->pluck('id','name')->all();

        $user->assignRole('superadmin');
        $admin->assignRole('admin');

        // superadmin
        $superAdminRole = Role::findByName('superadmin');
        $superAdminRole->givePermissionTo($permissions);
        // admin
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo($permissionsAdmin);


        $users = array(
            array('id' => '3','name' => 'Student - 1','email' => 'student1@gmail.com','phone_no' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$WqUI7hR2xDLhkygRh2ADQOlugQVjlQzzoKEg/2FtbcuMPrZ/b9zYC','image' => NULL,'address' => NULL,'is_blocked' => '0','is_certificate_enable' => '0','remember_token' => NULL,'created_at' => '2024-12-05 10:57:15','updated_at' => '2024-12-05 10:57:15'),
            array('id' => '4','name' => 'Dev Student','email' => 'devstudent@gmail.com','phone_no' => '5685044226','email_verified_at' => NULL,'password' => '$2y$12$uEsh/WgFt7x8Hbzv0Qust.AdL59fhogyI6xLcQuP3MLchSVRu8cca','image' => 'all-students/ncXP8i8m7cEwHlXCqKbIzGePPiqKWvuWmeniO6vI.jpg','address' => 'Rupgonj','is_blocked' => '0','is_certificate_enable' => '0','remember_token' => NULL,'created_at' => '2024-12-08 07:42:54','updated_at' => '2024-12-08 07:42:54'),
            array('id' => '5','name' => 'Dev Test','email' => 'devtest@gmail.com','phone_no' => '7868304071','email_verified_at' => NULL,'password' => '$2y$12$OYQmPop8UhaihAIAu9U/GeDeEM/ojp4CgAWJXj3gP8RND9IuC3WH6','image' => 'all-user/TiWrm02xx1ISPqnSlph6R6dtCMNdAvbRegkvtTDp.png','address' => 'Rupgonj','is_blocked' => '0','is_certificate_enable' => '0','remember_token' => NULL,'created_at' => '2024-12-08 08:46:25','updated_at' => '2024-12-08 08:46:25')
        );

        foreach ($users as $user) {
            $std = User::create($user);
            $std->assignRole('student');
        }
    }
}
