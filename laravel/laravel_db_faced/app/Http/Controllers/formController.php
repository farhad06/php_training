<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\view;

class formController extends Controller
{
    public function page_open():View{
        return view('home');
    }
}
