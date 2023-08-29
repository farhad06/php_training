<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data = DB::table('users')->get();
        return view('users')->with(['data'=>$data]);
    }

    public function get_all_food_items(){
        return view('food_iteam');
    }
}
