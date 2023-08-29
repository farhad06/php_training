<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    public function index(){
        return view('home');
    }

    public function user_registration_page(){
        return view('registration');
    }

    public function login_page(){
        return view('login');
    }

}
