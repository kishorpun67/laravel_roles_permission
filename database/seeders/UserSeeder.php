<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{User, Role, Permission };
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::insert([
            ['name' => 'Ueser Pun', 'email' => 'user@gmail.com', 'password' => \Hash::make('12345')],
            ['name' => 'Editor Pun', 'email' => 'editor@gmail.com', 'password' => \Hash::make('12345')],
            ['name' => 'Authoer Pun', 'email' => 'author@gmail.com', 'password' => \Hash::make('12345')],

        ]);
        Role::insert([
            ['name' => 'Editor', 'slug' => 'editor'],
            ['name' => 'Author', 'slug' => 'author'],
        ]);
        Permission::insert([
            ['name' => 'Add Post', 'slug' => 'add-post'],
            ['name' => 'Delete Post', 'slug' => 'delete-post'],
        ]);
    }
}
