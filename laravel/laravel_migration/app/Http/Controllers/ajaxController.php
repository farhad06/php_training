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
        //$data = $req->all();

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
            return response()->json(['message'=>'Data Successfully deleted']);
        }else{
            return response()->json(['message' => 'Error']);

        }

    }
}
