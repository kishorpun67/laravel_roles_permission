<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{User, Role, Permission,  };
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::insert([
            ['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => \Hash::make('12345')],
            ['name' => 'Editor', 'email' => 'editor@gmail.com', 'password' => \Hash::make('12345')],
            ['name' => 'Author', 'email' => 'author@gmail.com', 'password' => \Hash::make('12345')],
        ]);
        Role::insert([
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'SubAdmin', 'slug' => 'subadmin'],
            ['name' => 'Author', 'slug' => 'author'],
            ['name' => 'Editor', 'slug' => 'editor'],
        ]);
        Permission::insert([
            ['name' => 'Show ', 'slug' => 'show'],
            ['name' => 'Add ', 'slug' => 'add'],
            ['name' => 'Edit ', 'slug' => 'edit'],
            ['name' => 'Delete ', 'slug' => 'delete'],
        ]);
        DB::table('users_permissions')->insert([
            ['user_id' => 1, 'permission_id' => '1'],
            ['user_id' => 1, 'permission_id' => '2'],
            ['user_id' => 1, 'permission_id' => '3'],
            ['user_id' => 1, 'permission_id' => '4'],
        ]);
        DB::table('users_roles')->insert([
            ['user_id' => 1, 'role_id' => '1'],
            ['user_id' => 1, 'role_id' => '2'],
            ['user_id' => 1, 'role_id' => '3'],
            ['user_id' => 1, 'role_id' => '4'],
        ]);
    }
}
