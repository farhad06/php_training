<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class homeTask extends Controller
{
    //

    public function add_stu()
    {
        return view('students.add');
    }

    public function submit_details(Request $req)
    {
        //dd($req->all());

        $obj = new students();

        $obj->name = $req->name;
        $obj->email = $req->email;
        $obj->age = $req->age;
        $obj->phone = $req->phone;

        $obj->save();
    }
}
