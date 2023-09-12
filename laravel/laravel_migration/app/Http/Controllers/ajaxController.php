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
        //$data = $req->all();
        // $data=student::all();
        // echo $data;
       $data= DB::table('students')->get();
       //$data=json_encode($o_data);
    //    print('<pre>');
    //    print_r(json_decode($data));
        // $output="";
        // $output.= "<tr>
        //             <th>Name</th>
        //             <th>Email</th>
        //             <th>Phone</th>
        //             <th>Age</th>
        //             <th>Action</th>
        //         </tr>";

        //  foreach($data as $stu_details){
        //     $output.="
        //             <tr>
        //             <td>$</td>
        //             </tr>
        //     ";
        //  }       


        return response()->json($data);
    }
}
