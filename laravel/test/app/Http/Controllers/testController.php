<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    public function index()
    {
        $data = DB::table('students')->get();
        return view('show')->with(['data' => $data]);
    }


    public function add(){
        return view('add');
    }
    public function add_user(Request $req)
    {
        $image = $req->image;
        $password = $req->password;
        $enc_pass=password_hash($password,PASSWORD_DEFAULT);

        $location = 'uploads';
        $imageName="IMG_".time().".".$image->extension();
        $image->move($location,$imageName);
        $aff = DB::table('students')->insert([
            'name'=>$req->name,'email'=>$req->email,'phone'=>$req->phone,'image'=>$imageName,'password'=>$enc_pass
        ]);

        if($aff){
            return redirect('/')->with('message','Successfully Added');
        }else{
            return redirect('/')->with('message', 'Data not Added');

        }


    }
    public function delete($id)
    {
        $aff = DB::table('students')->where('id','=',$id)->delete();

        if ($aff) {
            return redirect('/')->with('message', 'Successfully deleted');
        } else {
            return redirect('/')->with('message', 'Something Went Wrong');
        }
    }

    public function edit($id)
    {
        $data = DB::table('students')->find($id);
        return view('update')->with(['data' => $data]);
    }

    public function update_user(Request $req)
    {
        $image = $req->image;
        $password = $req->password;
        $enc_pass = password_hash($password, PASSWORD_DEFAULT);

        $location = 'uploads';
        $imageName = "IMG_" . time() . "." . $image->extension();
        $image->move($location, $imageName);
        $aff = DB::table('students')->where('id','=',$req->id)->update([
            'name' => $req->name, 'email' => $req->email, 'phone' => $req->phone, 'image' => $imageName, 'password' => $enc_pass
        ]);

        if ($aff) {
            return redirect('/')->with('message', 'Successfully Updated');
        } else {
            return redirect('/')->with('message', 'Data not Updated');
        }
    }

}
