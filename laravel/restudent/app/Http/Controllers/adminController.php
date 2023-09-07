<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    #show admin login page
    public function admin_login_page()
    {
        return view('admin_login');
    }

    #admin login
    public function login(Request $req)
    {
        //dd($req->all());
        $admin = DB::table('admin')->where('name', '=', $req->admin_name)->where('password', '=', $req->admin_password)->get();
        //dd($admin);
        if (empty($admin[0])) {
            return redirect('/admin')->with('message', 'Wrong Credintial');
        } else {
            $req->session()->put('admin_name', $admin[0]->name);
            $req->session()->put('admin_id', $admin[0]->id);
            return redirect('/dashboard');
        }
    }

    #admin logout
    public function logout(Request $req)
    {
        $req->session()->forget('admin_name');
        $req->session()->flush();
        return redirect('/admin');
    }

    #show dashboard
    public function dashboard()
    {
        $count_book = DB::table('booking')->count();
        $count_user = DB::table('users')->count();
        $count_item = DB::table('food_items')->count();

        return view('dashboard')->with(['count_book' => $count_book, 'count_user' => $count_user, 'count_item' => $count_item]);
    }

    #show all user
    public function get_all_users()
    {
        $data = DB::table('users')->get();
        return view('users')->with(['data' => $data]);
    }

    #delete user
    public function delete_user($id)
    {
        $item_data = DB::table('users')->find($id);
        $delete_img = $item_data->photo;
        $delete_item_image = "uploads/" . $delete_img;
        $aff = DB::table('users')->where('id', $id)->delete();

        if ($aff) {
            unlink($delete_item_image);
            return redirect('/allusers')->with('message', 'User Deleted');
        } else {
            return redirect('/allusers')->with('message', 'Something went wrong');
        }
    }

    #get all booking 
    public function get_all_booking()
    {
        $data = DB::table('booking')->get();
        return view('get_booking')->with(['data' => $data]);
    }

    #delete booking
    public function delete_booking($id)
    {
        $aff = DB::table('booking')->where('id', $id)->delete();

        if ($aff) {
            return redirect('/getbooking')->with('message', 'Order Deleted');
        } else {
            return redirect('/getbooking')->with('message', 'Something went wrong');
        }
    }

    #add items in database
    public function add_items(Request $req)
    {
        $image = $req->i_image;
        $location = 'items_images';
        $extension = $image->getClientOriginalExtension();
        $imageName = "IMG_" . time() . ".$extension";

        $image->move($location, $imageName);
        $aff = DB::table('food_items')->insert([

            'i_name' => $req->i_name,
            'price' => $req->i_price,
            'i_image' => $imageName,
            'i_desc' => $req->i_desc
        ]);

        if ($aff) {
            return redirect('/allfood')->with('message', 'Item Added');
        } else {
            return redirect('/allfood')->with('message', 'Item Not Added');
        }
    }

    #show all food item in dashboard
    public function get_all_food_items()
    {
        $data = DB::table('food_items')->get();
        //dd($data);
        return view('food_iteam')->with(['data' => $data]);
        //return view('food_iteam');
    }

    #delete items
    public function delete_item($id)
    {
        $item_data = DB::table('food_items')->find($id);
        $delete_img = $item_data->i_image;
        $delete_item_image = "items_images/" . $delete_img;
        $aff = DB::table('food_items')->where('id', $id)->delete();

        if ($aff) {
            unlink($delete_item_image);
            return redirect('/allfood')->with('message', 'Item Deleted');
        } else {
            return redirect('/allfood')->with('message', 'Something went wrong');
        }
    }

    public function edit_item($id)
    {
        $item_data = DB::table('food_items')->find($id);
        return view('edit_item')->with(['data' => $item_data]);
    }

    public function update_item(Request $req)
    {
        $image = $req->i_image;
        $location = 'items_images';
        $extension = $image->getClientOriginalExtension();
        $imageName = "IMG_" . time() . ".$extension";

        $image->move($location, $imageName);
        $aff = DB::table('food_items')->where('id','=',$req->id)->update([

            'i_name' => $req->i_name,
            'price' => $req->i_price,
            'i_image' => $imageName,
            'i_desc' => $req->i_desc
        ]);

        if ($aff) {
            return redirect('/allfood')->with('message', 'Item Details Updated');
        } else {
            return redirect('/allfood')->with('message', 'Item Details Not Updated');
        }
    }
}
