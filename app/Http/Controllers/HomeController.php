<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ { User,Role, Permission};


class HomeController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        // $role = Role::where('slug', 'author')->first();
        // $user->roles()->attach($role);
        // return $user->can('editor');
        // return $user->hasRole('editor');

        $permissions = Permission::first();
        // $user->permissions()->attach($permissions);
        // return $user->hasPermissionTo($permissions);

        // return $user->hasPermissionTo;
        
        return view('dashboard');
    }
}
