<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class apiCrudController extends Controller
{
    public function get_students(){
        $data=DB::table('students')->get();
        //return $data;
        return response()->json($data);
    }

    public function login_page(Request $req)
    {
        $response_data = $req->all();

        return response()->json($response_data);
        //return view('login');
    }

    public function login(Request $req)
    {
        //dd($req->all());
        // $response_data = $req->all();

        // return response()->json($response_data);
    }
}
