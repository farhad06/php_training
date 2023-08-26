<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\view;

class formController extends Controller
{
    public function page_open(): View
    {
        return view('home');
    }

    public function form_page()
    {
        //dd($request->all());

        return view('signup');
    }

    public function form_submit(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|min:3|max:20',
            'phone' => 'required',
            'email' => 'required',
            'picture' => 'required|max:1000|mimes:jpeg,jpg,png,webp'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $pass = $request->input('pass');
        $image = $request->file("picture");
        //dd($image);
        $enc_pass = password_hash($pass,PASSWORD_DEFAULT);

        //$image->getClientOriginalName()
        $extension= $image->getClientOriginalExtension();
        $imageName = "IMG_".time().".$extension";

        //dd($imageName);
        $location = 'uploads';
        $image->move($location,$imageName);


        // $user = [
        //     'name' => $name,
        //     'email' => $email,
        //     'phone' => $phone,
        //     'pass' => $pass
        // ];

        $aff_row = DB::table('students')->insert([
            'name'=> $name,
            'email' => $email,
            'phone' => $phone,
            'image' => $imageName,
            'password'=> $enc_pass
        ]);

        if($aff_row){
            return redirect()->route('home')->with('message', "Successfully Submitted");
            #return view('signup')->with(['message' => "Successfully Submitted"]);

        }else{
            return view('signup')->with(['message' => "Something Went Wrong"]);

        }
        //return view('signup')->with(['info'=>$user]);
    }

    public function get_all_data(){
        $details=DB::table('students')->get();
        //dd($details);

        return view('get_all')->with(['details'=>$details]);
    }

    public function edit_page($id){
        $data=DB::table('students')->where('id','=',$id)->get();
        //dd($data[0]);

        return view('edit_page')->with(['data'=>$data[0]]);
    }

    public function form_update(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $image = $request->file("picture");

        $id= $request->input('id');
      

        //$image->getClientOriginalName()
        $extension = $image->getClientOriginalExtension();
        $imageName = "IMG_" . time() . ".$extension";

        //dd($imageName);
        $location = 'uploads';
        $image->move($location, $imageName);

        $aff_row = DB::table('students')->where('id','=',$id)->update([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'image' => $imageName,
        ]);

        if ($aff_row) {
            return redirect()->route('home')->with('message', "Successfully Updated");
            #return view('signup')->with(['message' => "Successfully Submitted"]);

        } else {
            return redirect()->route('home')->with('message', "Something Went Wrong");
        }
    }
}

