<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class formController extends Controller
{
    #user login into the system
    public function login(Request $req){
        //dd($req->all());
        $user = DB::table('users')->where('name','=',$req->username)->orWhere('email', '=', $req->username)->orWhere('phone', '=', $req->username)->get();
        if (empty($user[0])) {
            return redirect('/login')->with('message', 'User not Exists');
        }else{
            $db_pass=$user[0]->password;
            if(password_verify($req->upassword,$db_pass)){
                $req->session()->put('user_name', $user[0]->name);
                $req->session()->put('user_id', $user[0]->id);
                $req->session()->put('user_photo', $user[0]->photo);
                return redirect('/');

            }else{
                return redirect('/login')->with('message', 'Wrong Credential');
            }
        }

    }

    //user logout from the system
    public function logout(Request $req)
    {
        //$req->session()->forget('user_id');
        $req->session()->flush();
        return redirect('/');
    }
    //view index page
    public function index(){
        $chef_data = DB::table('chefs')->get();
        $item_data = DB::table('food_items')->get();
        //dd($chef_data);
        return view('home')->with(['chef_data' => $chef_data,'item_data'=>$item_data]);
        //return view('home');
    }

    //view user registration page
    public function user_registration_page(){
        return view('registration');
    }

    //view login page
    public function login_page(){
        return view('login');
    }

    //user registration 
    public function user_registration(Request $req){
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

    #book restrudent 
    public function book_restrudent(Request $req){
        $currentDate = date('Y-m-d');
        $book_date = new DateTime($req->date);
        $today = new DateTime($currentDate);
         
        if($book_date<$today){
            // echo '<script>
            // alert("You can not Book this date!!");
            // window.location.href="url('/')";
            // </script>';
            return redirect('/')->with('message', 'You can not Book this date!!');  
        }

        $book_id="BID_".time().random_int(100,999);

        $aff_row=DB::table('booking')->insert([
            'b_id'=>$book_id,
            'name'=>$req->name,'email' => $req->email,'phone' => $req->phone, 'number_guests' => $req->number_guests,'date' => $req->date,'time' => $req->time,'message' => $req->message
        ]);
        if ($aff_row) {
            return redirect('/')->with('message', 'Booking Successfully.');
        } else {
            return redirect('/')->with('message', 'Something Went Wrong!!');
        }

    }

    //show user profile
    public function user_profile($id){
        $data=DB::table('users')->find($id);

        return view('user_profile')->with(['data'=>$data]);
    }

    public function update_user_basic_info(Request $req){

        $aff=DB::table('users')->where('id','=',$req->user_id)->update([
            'name'=>$req->name, 'phone' => $req->phone, 'age' => $req->age, 'city' => $req->city,'address'=>$req->address
        ]);

        #create a url because this url contains user's id 
        $url = '/user_profile' . $req->user_id;
        if($aff){
            return redirect($url)->with('message','Data Changed');
        }else{
            return redirect($url)->with('message','Something Went Wrong');
        }

    }

    public function update_user_photo(Request $req){
        $image = $req->photo;
        $location = 'uploads';
        $extension = $image->getClientOriginalExtension();
        $imageName = "IMG_" . time() . ".$extension";

        $image->move($location, $imageName);
        $aff = DB::table('users')->where('id', '=', $req->user_id)->update([
            'photo' =>$imageName
        ]);

        #create a url because this url contains user's id 
        $url = '/user_profile' . $req->user_id;
        if ($aff) {
            return redirect($url)->with('message', 'Profile Photo Updated');
        } else {
            return redirect($url)->with('message', 'Something Went Wrong');
        }

    }

    public function update_user_password(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'password' => 'required|string',
            'c_password' =>  'required|string'
        ]);
        if($validator->fails()){
            $error = ['error' => $validator->errors()->all()];
            return response()->json(['status' => false, 'message' => $validator->errors()->all()], 422);
        }
        $url = '/user_profile' . $req->user_id;

        if($req->password == $req->c_password){
            $enc_pass=password_hash($req->password,PASSWORD_DEFAULT);
            $aff = DB::table('users')->where('id', '=', $req->user_id)->update([
                'password' => $enc_pass
            ]);
        }else{
            return response()->json(['status' => false, 'message' => 'Password not match'], 200);
        }

        #create a url because this url contains user's id 
        // if ($aff) {
        //     return redirect($url)->with('message', 'Data Changed');
        // } else {
        //     return redirect($url)->with('message', 'Something Went Wrong');
        // }
        if($aff){
            return response()->json(['status'=>true, 'message'=>'Password updated successfully'], 200);
        }else{
            return response()->json(['status' => false, 'message' => 'Password not updated'], 200);
        }
    }

}
