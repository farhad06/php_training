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

    public function show_post(){
        $data=post::all();
        //dd($data);
        return view('show_posts')->with(['data'=>$data]);
    }

    public function edit_post($id){
        $data=post::all()->find($id);
        return view('update_post')->with(['data'=>$data]);
    }

    public function update_post(Request $req){
        // $obj=new post();
        // $obj->title = $req->title;
        // $obj->description = $req->des;
        // $obj->save()->where('id');

        return redirect('/add')->with('message', 'Post Added');
    }
}
