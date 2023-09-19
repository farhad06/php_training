<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\student;

class ajaxController extends Controller
{
    public function add_student()
    {
        return view('ajax_post');
    }

    public function submit_data(Request $req)
    {
        // $data = $req->all();
        // dd($data);

        DB::table('students')->insert([
            'name'=>$req->name,
            'email' => $req->email,'phone' => $req->phone,'age' => $req->age, 'address' => $req->address

        ]);

        return response()->json(['status'=>200]);
    }
    public function get_student()
    {
        $data= DB::table('students')->get();
        return response()->json($data);
    }

    public function delete_student($id){
        $res=DB::table('students')->where('id','=',$id)->delete();

        if($res){
            return response()->json(["message"=>'Student Deleted','status'=>200]);
        }else{
            return response()->json(['message' => 'Error']);

        }

    }
    public function edit_student($id)
    {
        $data = DB::table('students')->where('id','=',$id)->get();
        return response()->json($data[0]);
    }

    public function update_student_data(Request $req){
        // $data=$req->all();
        // dd($data);
        // print('<pre>');
        // print_r($data);
        // exit;
        DB::table('students')->where('id','=',$req->e_id)->update([
            'name' => $req->e_name,
            'email' => $req->e_email, 'phone' => $req->e_phone, 'age' => $req->e_age, 'address' => $req->e_address

        ]);

        return response()->json(['status' => 200]);

    }
}
