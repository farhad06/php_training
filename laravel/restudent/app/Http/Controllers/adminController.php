<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{

    public function admin_login_page()
    {
        return view('admin_login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function get_all_users(){
        return view('users');
    }

    public function get_all_food_items(){
        return view('food_iteam');
    }
}
