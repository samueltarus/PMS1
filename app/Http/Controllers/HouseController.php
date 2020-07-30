<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Landlord;
use App\Tenant;
use App\Property;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\str_random;
use Illuminate\Support\Str;

class HouseController extends Controller
{


    public function all_houses(){
        $houses = DB::table('houses')
        ->join('properties', 'houses.property_id',  '=', 'properties.id')
        ->select('houses.*', 'properties.property_name')
        ->get();

        // $houses->houses()->where('title', '')->first();
        // $houses=House::all()->where('ladnlord_id',$properties->id)->value('property_name');
        // $houses=House::all()->where('property_id');
        // $houses= House::with('property')->get();
        return view('admin.all_houses',compact('houses'));
    }

    public function add_house(){
        $houses = DB::select('select property_name ,id from properties ');

        return view('admin.add_house',compact('houses'));
    }

    public function save_house(Request $request){
        $data =array();

        $data['property_id']=$request->property_id;
        $data['unit_name']=$request->unit_name;
        $data['unit_type'] = $request->unit_type;
        $data['status']=$request->status;




     //    $data['publication_status']=$request->publication_status;

        $image=$request->file('avatar');

        if ($image) {

            $image_name = Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image_houses/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {



                $data['avatar'] = $image_url;

                DB::table('houses')->insert($data);


                return Redirect::to('all-houses');

            }
        }

        $data['image']='';
        DB::table('houses')->insert($data);


        return Redirect::to('all-houses');
    }


    public function edit_house($id){
        $houses=DB::table('houses')
        ->where('id',$id)
        ->first();
        return view('admin.edit_house',compact('houses'));
    }


    public function update_house(Request $request ,$id){

        $data =array();
        $data['property_name']=$request->property_name;
        $data['unit_name']=$request->unit_name;
        $data['unit_type'] = $request->unit_type;
        $data['status']=$request->status;

        $image=$request->file('avatar');

        if ($image) {

            $image_name = Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image_houses/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {

                $data['avatar'] = $image_url;
                DB::table('houses')
                ->where('id',$id)
                ->update($data);

                return Redirect::to('all-houses');
                    }
        }

        $data['image']='';
        DB::table('houses')
                ->where('id',$id)
                ->update($data);

                return Redirect::to('all-houses');
    }

    public function delete_house($id){
        DB::table('houses')
        ->where('id',$id)
        ->delete();
        return Redirect::to('all-houses');
    }




    // OCCUPPIED OPERATIONS FUNCTIONS

    public function all_occupied_houses(){


        $houses = DB::table('houses')
                    ->join('properties', 'houses.property_id',  '=', 'properties.id')
                    ->select('houses.*', 'properties.property_name')
                    ->where('houses.status',1)
                    ->get();

        return view ('admin.all_occupied_houses',compact('houses'));
    }



    // VACANT OPERATIONS  FUCNTIONS  on vacant house
    public function all_vacant_houses(){
        $houses = DB::table('houses')
        ->join('properties', 'houses.property_id',  '=', 'properties.id')
        ->select('houses.*', 'properties.property_name')
        ->where('houses.status',0)
        ->get();

        return view ('admin.all_vacant_houses',compact('houses'));
    }

    // houses Operation

    public function assign_houses(){

        $property_name =DB::table('properties')->select( 'id','property_name')->get();
        $passport =DB::table('tenants')->select( 'id','passport')->get();

        return view ('admin.assign_house',compact('property_name','passport'));

    }
    public function save_tenant_houses(Request $request ){
        $data =array();

        $data['passport']=$request->passport;
        $data['username']=$request->username;
        $data['property_name']=$request->property_name;
        $data['unit_name']=$request->unit_name;
        $data['monthly_rent']=$request->monthly_rent;

        $id =House::select('id')->where('id')->get();

        DB::transaction(function() use ($data,$id)
            {
                DB::table('houses')->update(['status' => 1]);

                DB::table('tenant_houses')->insert($data);

            });

            return Redirect::to('all-houses');


    }

    public function find_unit_name(Request $request){

        $data =House::select('unit_name','id')->where('id',$request->id)->get();

        return response()->json($data);

    }


    public function find_tenant(Request $request){

        $data =Tenant::select('username','id')->where('id',$request->id)->get();

        return response()->json($data);


    }




    // activation on houses


    public function unactive_house($id){

        $Houses= DB::table('houses')
                        ->where('id',$id)
                        ->update(['status'=>1]);

        return Redirect::to('all-houses');

     }
     public function active_house($id){

        $Houses= DB::table('houses')
                        ->where('id',$id)
                        ->update(['status'=>0]);

        return Redirect::to('all-houses');

     }
      public function delete_landlord($id){
        DB::table('landlords')
        ->where('id',$id)
        ->delete();
        return Redirect::to('all-landlords');
    }
}
