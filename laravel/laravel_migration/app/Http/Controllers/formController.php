<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class formController extends Controller
{
    public function show(){
        return view('add');
    }

    public function add_posts(Request $req){
        $obj= new post();
        
        $obj->title=$req->title;
        $obj->description = $req->des;
        $obj->save();

        return redirect('/add')->with('message','Post Added');

    }
}
