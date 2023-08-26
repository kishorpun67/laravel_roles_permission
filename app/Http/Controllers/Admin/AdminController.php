<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class AdminController extends Controller
{
    public function dashboard() 
    {
        Session::flash('page', 'dashboard');
        return view('admin.dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return to_route('index');
    }
}
