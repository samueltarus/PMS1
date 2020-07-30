<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Landlord;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\str_random;
use Illuminate\Support\Str;


class LandlordController extends Controller
{
    public function all_landlord(){
         $landlords=Landlord::all();
        return view('admin.all_landlords',compact('landlords'));
    }

    public function add_landlord(){
        return view('admin.add_landlord');
    }

    public function show_landlord($id){

        $landlords =Landlord::find($id);

        return view('admin.show_landlord',compact('landlords','id'));

    }



    public function save_landlord(Request $request ){
        $data =array();
        $data['first_name']=$request->first_name;
        $data['last_name']=$request->last_name;
        $data['username'] = $request['first_name'].' '.$data['last_name'];
        $data['email']=$request->email;
        $data['passport']=$request->passport;
        $data['password']=$request->password;
        $data['confirm_password']=$request->confirm_password;
        $data['birth_date']=$request->birth_date;
        $data['gender']=$request->gender;
        $data['address']=$request->address;
        $data['county']=$request->county;
        $data['constituency']=$request->constituency;
        $data['town']=$request->town;
        $data['phone_number']=$request->phone_number;
        $data['status']=$request->status;




     //    $data['publication_status']=$request->publication_status;

        $image=$request->file('avatar');

        if ($image) {

            $image_name = Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image_landlords/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {

                $data['avatar'] = $image_url;
                DB::table('landlords')->insert($data);


                return Redirect::to('all-landlords');

            }
        }

        $data['image']='';
        DB::table('landlords')->insert($data);


        return Redirect::to('all-landlords');

    }


    public function edit_landlord($id){
        $landlords=DB::table('landlords')
        ->where('id',$id)
        ->first();
        return view('admin.edit_landlord',compact('landlords'));
    }


    public function update_landlord(Request $request, $id){
        $data =array();
         $data['first_name']=$request->first_name;
        $data['last_name']=$request->last_name;
        $data['username'] = $request['first_name'].' '.$data['last_name'];
        $data['email']=$request->email;
        $data['passport']=$request->passport;
        $data['phone_number']=$request->phone_number;
        $data['status']=$request->status;

     DB::table('landlords')
             ->where('id',$id)
             ->update($data);

             return Redirect::to('all-landlords');

    }



    public function edit_landlord_profile($id){
        $landlords=DB::table('landlords')
                ->where('id',$id)
                ->first();
        return view('admin.edit_landlord_profile',compact('landlords'));
    }

    public function update_landlord_profile( Request $request, $id){
        $data =array();
       $image=$request->file('avatar');

        if ($image) {

        $image_name = Str::random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='image_landlords/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if ($success) {

            $data['avatar'] = $image_url;

            DB::table('landlords')
                ->where('id',$id)
                ->update($data);

                return Redirect::to('show-landlord');

        }
    }

    $data['image']='';

    DB::table('landlords')
                ->where('id',$id)
                ->update($data);
                return Redirect::to('show-landlord');

    }

    public function delete_landlord($id){
        DB::table('landlords')
        ->where('id',$id)
        ->delete();
        return Redirect::to('all-landlords');
    }


}
