<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    public function test_data(){
        $data=DB::table('test')->get();
        //dd($data);
        return view('test.show')->with(['data'=>$data]);
    }

    public function test(){
        return view('test.addtest');
    }

    public function add_test(Request $req)
    {
        $image=$req->image;

        $location="test-image";
        $imageName="IMG_".time().".".$image->extension();

        $image->move($location,$imageName);

        $aff=DB::table('test')->insert([
            'name'=>$req->name,
            'image'=>$imageName
        ]);

        if($aff){
            return redirect('/gettest')->with('message','Post Added');
        }else{
            return redirect('/gettest')->with('message', 'Post Not Added');

        }
    }
    public function delete_post($id)
    {
        

        $aff = DB::table('test')->where('id','=',$id)->delete();

        if ($aff) {
            return redirect('/gettest')->with('message', 'Post deleted');
        } else {
            return redirect('/gettest')->with('message', 'Post Not deleted');
        }
    }
    public function edit_post($id)
    {
        $data = DB::table('test')->find($id);
        //dd($data);
        return view('test.edit')->with(['data' => $data]);
    }
    public function update_test(Request $req)
    {
        $image = $req->image;

        $location = "test-image";
        $imageName = "IMG_" . time() . "." . $image->extension();

        $image->move($location, $imageName);

        $aff = DB::table('test')->where('id','=',$req->id)->update([
            'name' => $req->name,
            'image' => $imageName
        ]);

        if ($aff) {
            return redirect('/gettest')->with('message', 'Post Updated');
        } else {
            return redirect('/gettest')->with('message', 'Post Not Updated');
        }
    }
}


