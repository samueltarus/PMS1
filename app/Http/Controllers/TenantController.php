<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landlord;
use App\Property;
use App\Tenant;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\str_random;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{

    public function all_tenants(){
        $tenants=Tenant::all();
        return view('admin.all_tenants',compact('tenants'));
    }

    public function add_tenant(){
        return view('admin.add_tenant');
    }



    public function save_tenant(Request $request){
        $data =array();

        $data['first_name']=$request->first_name;
        $data['last_name']=$request->last_name;
        $data['username'] = $request['first_name'].' '.$data['last_name'];
        $data['passport']=$request->passport;
        $data['email'] = $request->email;

        $data['occupation']=$request->occupation;
        $data['age']=$request->age;

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
            $upload_path='image_tenants/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {

                $data['avatar'] = $image_url;
                DB::table('tenants')->insert($data);


                return Redirect::to('all-tenants');

            }
        }

        $data['image']='';
        DB::table('tenants')->insert($data);


        return Redirect::to('all-tenants');
    }


    public function edit_tenant($id){
        $tenants=DB::table('tenants')
        ->where('id',$id)
        ->first();
        return view('admin.edit_tenant',compact('tenants'));
    }


    public function update_tenant(Request $request ,$id){
        $data =array();


        $data['first_name']=$request->first_name;
        $data['last_name']=$request->last_name;
        $data['username'] = $request['first_name'].' '.$data['last_name'];
        $data['passport']=$request->passport;
        $data['email'] = $request->email;

        $data['occupation']=$request->occupation;
        $data['age']=$request->age;

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
            $upload_path='image_tenants/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {

                $data['avatar'] = $image_url;
                DB::table('tenants')
                ->where('id',$id)
                ->update($data);

                return Redirect::to('all-tenants');
                    }
        }

        $data['image']='';
        DB::table('tenants')
                ->where('id',$id)
                ->update($data);

                return Redirect::to('all-tenants');
    }
    public function delete_tenant($id){
        DB::table('tenants')
        ->where('id',$id)
        ->delete();
        return Redirect::to('all-tenants');
    }
}
