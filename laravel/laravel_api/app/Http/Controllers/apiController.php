<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class apiController extends Controller
{
    public function http_client_response(){
        $response=Http::get('https://reqres.in/api/users?page=2');
        // print('<pre>');
        // print_r($response->body());
        return $response;
    }

    public function login_page(){
        return view('login');
    }

    public function login(Request $req){
        //dd($req->all());
        $response=Http::post('https://reqres.in/api/register',[
            'email'=>$req->email,
            'password'=>$req->password

        ]);

        return $response;
    }
}
