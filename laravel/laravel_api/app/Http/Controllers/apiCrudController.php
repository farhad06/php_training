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

    public function add_students(Request $req){
        $data=$req->all();
        // print("<pre>");
        // print_r($data);
        DB::table('students')->insert([
            'name' => $req->name,
            'email' => $req->email, 'phone' => $req->phone, 'age' => $req->age, 'address' => $req->address

        ]);

        return response()->json(['message'=>'Data Saved Successfully','data'=>$data]);
    }
    public function delete_student($id)
    {
        $res = DB::table('students')->where('id', '=', $id)->delete();

        if ($res) {
            return response()->json(["message" => 'Student Deleted', 'status' => 200]);
        } else {
            return response()->json(['message' => 'Error']);
        }
    }

    public function update_student($id,Request $req)
    {
        // return  $req->all();
        // exit;
        DB::table('students')->where('id', '=',$id)->update([
            'name' => $req->name,
            'email' => $req->email, 'phone' => $req->phone, 'age' => $req->age, 'address' => $req->address

        ]);

        return response()->json(['status' => 200]);
    }
}
