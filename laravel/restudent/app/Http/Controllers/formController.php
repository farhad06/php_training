<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function user_registration(Request $req){
        //dd($req->all());

        if($req->password != $req->c_password){
            echo "<script>alert('Password & Confirm Password are not Matched!!')</script>";
            exit;
        }

        $enc_pass=password_hash($req->password,PASSWORD_DEFAULT);
        $image=$req->photo;
        $location='uploads';
        $extension=$image->getClientOriginalExtension();
        $imageName="IMG_".time().".$extension";

        $image->move($location,$imageName);
        
        $aff_row= DB::table('users')->insert([
            'name'=>$req->name,
            'email'=> $req->email,
            'phone'=> $req->phone,
            'age'=> $req->age,
            'gender'=> $req->gender,
            'city'=> $req->city,
            'address'=> $req->address,
            'photo'=>$imageName,
            'password'=>$enc_pass
        ]);

        if($aff_row){
             return redirect('/');
        }else{
            return redirect('/');
        }
    }

}
