<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\view;

class formController extends Controller
{
    public function page_open(): View
    {
        return view('home');
    }

    public function form_page()
    {
        //dd($request->all());

        return view('signup');
    }

    public function form_submit(Request $request)
    {
        //dd($request->all());

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $pass = $request->input('pass');


        $user = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'pass' => $pass
        ];

        return view('signup')->with(['info'=>$user]);
    }
}
