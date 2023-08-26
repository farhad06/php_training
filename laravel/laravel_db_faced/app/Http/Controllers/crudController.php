<?php

namespace App\Http\Controllers;

use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class crudController extends Controller
{
    //

    public function form_show(){
        return view('add_player');
    }

    public function add_player(Request $req){
        //dd($req->all());
        $image=$req->file('image');
        //dd($image);
        if (($image!= null)){
        $location="uploads";
        $imageName="IMG_".random_int(1000,9999).".".$image->getClientOriginalExtension();
        $image->move($location,$imageName);
        $aff=DB::table('players')->insert([
            'name'=>$req->name,'team' => $req->team, 'high_score' => $req->hs,'image'=>$imageName
        ]);
        }else{
            $aff = DB::table('players')->insert([
                'name' => $req->name, 'team' => $req->team, 'high_score' => $req->hs
            ]);

        }

        if($aff){
            return redirect('/showPlayer');
        }
    }

    public function show_all_player(){
        $data=DB::table('players')->get();

        //dd($data);

        return view('show_all_players')->with(['data'=>$data]);
    }

    public function edit_player($id){

        $data=DB::table('players')->find($id);

        //dd($data);

        return view('edit_player')->with(['data'=>$data]);

    }

    public function update_player(Request $req){
        //dd($req->all());
        $image = $req->file('image');
        //dd($image);
        $id = $req->input('id');
        $location = "uploads";
        // if(($image != null)){
        $imageName = "IMG_" . random_int(1000, 9999) . "." . $image->getClientOriginalExtension();
        $image->move($location, $imageName);
        $aff=DB::table('players')->where('id',$id)->update([
            'name' => $req->name, 'team' => $req->team, 'high_score' => $req->hs,'image'=>$imageName

        ]);
        // }else{
        //     $aff=DB::table('players')->where('id',$id)->update([
        //     'name' => $req->name, 'team' => $req->team, 'high_score' => $req->hs]);

        // }
        if ($aff) {
            return redirect('/showPlayer');
        }
    }

    public function delete_player($id){

        $data=DB::table('players')->find($id);

        $image=$data->image;

        //dd($image);

        $imageName="uploads/".$image;

        $aff=DB::table('players')->where('id',$id)->delete();

        if($aff){
            unlink($imageName);
            return redirect('/showPlayer');

        }
    }
}
