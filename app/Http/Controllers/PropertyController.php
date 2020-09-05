<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landlord;
use App\Property;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\str_random;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function all_properties(){
        $properties = DB::table('properties')
        ->join('landlords', 'properties.landlord_id',  '=', 'landlords.id')
        ->select('properties.*', 'landlords.username')
        ->where('landlords.status',1)
        ->get();
        // $properties=Property::all();

        return view('admin.all_properties',compact('properties'));
    }

    public function add_property(){
        $landlords =DB::select('select username ,id from landlords ');
        return view('admin.add_property',compact('landlords'));
    }

    public function save_property(Request $request){
        $data =array();
        $data['landlord_id']=$request->landlord_id;
        $data['property_name']=$request->property_name;
        $data['property_manager']=$request->property_manager;
        $data['property_number']=$request->property_number;

        $data['property_type']=$request->property_type;
        $data['property_description'] = $request->property_description;
        $data['number_of_units']=$request->number_of_units;
        $data['projected_monthly_rev']=$request->projected_monthly_rev;
        $data['projected_annulized_rev']=$request->projected_annulized_rev;

        $data['management_fee']=$request->management_fee;

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
            $upload_path='image_properties/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {

                $data['avatar'] = $image_url;

                DB::table('properties')->insert($data);
                return Redirect::to('all-properties');

            }
        }

        $data['image']='';
        DB::table('properties')->insert($data);


        return Redirect::to('all-properties');
    }

    public function edit_property($id){
        $properties=DB::table('properties')
        ->where('id',$id)
        ->first();
        return view('admin.edit_property',compact('properties'));
    }

    public function update_property(Request $request ,$id){
        $data =array();

        $data['property_name']=$request->property_name;
        $data['property_type']=$request->property_type;
        $data['property_description'] = $request->property_description;
        $data['number_of_units']=$request->number_of_units;
        $data['projected_monthly_rev']=$request->projected_monthly_rev;
        $data['projected_annulized_rev']=$request->projected_annulized_rev;

        $data['address']=$request->address;
        $data['county']=$request->county;
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
            $upload_path='image_properties/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {

                $data['avatar'] = $image_url;
                DB::table('properties')
                ->where('id',$id)
                ->update($data);

                return Redirect::to('all-properties');
                    }
        }

        $data['image']='';
        DB::table('properties')
                ->where('id',$id)
                ->update($data);

                return Redirect::to('all-properties');
    }
    public function delete_property($id){
        DB::table('properties')
        ->where('id',$id)
        ->delete();
        return Redirect::to('all-properties');
    }

}
