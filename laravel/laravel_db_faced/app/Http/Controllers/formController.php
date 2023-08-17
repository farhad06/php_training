<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $request->validate([
            'name' => 'required|min:3|max:20',
            'phone' => 'required',
            'email' => 'required'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $pass = $request->input('pass');


        // $user = [
        //     'name' => $name,
        //     'email' => $email,
        //     'phone' => $phone,
        //     'pass' => $pass
        // ];

        $aff_row = DB::table('students')->insert([
            'name'=> $name,
            'email' => $email,
            'phone' => $phone,
            'password'=>$pass
        ]);

        if($aff_row){
            #return redirect()->route('home')->with(['message' => "Successfully Submitted"]);
            return view('signup')->with(['message' => "Successfully Submitted"]);

        }else{
            return view('signup')->with(['message' => "Something Went Wrong"]);

        }
        //return view('signup')->with(['info'=>$user]);
    }
}

