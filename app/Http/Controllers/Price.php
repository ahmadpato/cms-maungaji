<?php

namespace App\Http\Controllers;

use App\File;
use App\Users;
use App\Groups;
use Carbon\Carbon;
use App\UploadedFile;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Price extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price = DB::table('mau_price')
        ->select('*')
        ->get();

        return view('price/price',['price' => $price]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('price/add_price');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->_token != ''){

            $image_online = $request->file('image');
            $image_home_visit = $request->file('image_home_visit');
            $image_learning_center = $request->file('image_learning_center');

            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif|max:500000',
                'image_home_visit' => 'mimes:jpeg,jpg,png,gif|max:500000',
                'image_learning_center' => 'mimes:jpeg,jpg,png,gif|max:500000'
            ]);
            
            if($request->service_type == 'online'){
                $image_name_online = time() . '.' . $image_online->getClientOriginalExtension();
                $image_online->move(public_path('images'), $image_name_online);
            } elseif ($request->service_type == 'home_visit'){
                $image_name_home_visit = time() . '.' . $image_home_visit->getClientOriginalExtension();
                $image_home_visit->move(public_path('images'), $image_name_home_visit);
            } else {
                $image_name_learning_center = time() . '.' . $image_learning_center->getClientOriginalExtension();
                $image_learning_center->move(public_path('images'), $image_name_learning_center);
            }

            DB::table('mau_price')->insert([
                'package_name' => $request->package_name,
                'price' => $request->price,
                'class_type' => $request->class_type,
                'session_type' => $request->session_type,
                'service_type' => $request->service_type,
                'photo' => isset($image_name_online) ? $image_name_online : null,
                'photo_home_visit' => isset($image_name_home_visit) ? $image_name_home_visit : null,
                'photo_learning_center' => isset($image_name_learning_center) ? $image_name_learning_center : null,
                'max_student' => $request->max_student,
                'learning_duration' => $request->learning_duration,
                'description' => $request->description,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Session::flash('flash_message', 'succesfully saved.');

            return redirect('/price');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = DB::table('mau_price')
        ->Select('*')
        ->where('id', $id)
        ->get();

        return view('price/edit_price', ['price' => $price]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        if($request->_token != ''){
            
            //icon service online
            $image_name_online = $request->image;
            $image_service_online = $request->file('image');

            //icon service home service
            $image_name_home_visit = $request->image_home_visit;
            $image_service_home_visit = $request->file('image_home_visit');

            //icon service learning center
            $image_name_learning_center = $request->image_learning_center;
            $image_service_learning_center = $request->file('image_learning_center');
            
            //validation icon service online
            if($image_service_online != '') {
                $request->validate([
                    'image' => 'mimes:jpeg,jpg,png,gif|required|max:500000'
                ]);
    
                $image_name_online = time() . '.' . $image_service_online->getClientOriginalExtension();
                $image_service_online->move(public_path('images'), $image_name_online);
            } 

            //validation icon service home visit
            if($image_service_home_visit != '') {
                $request->validate([
                    'image_home_visit' => 'mimes:jpeg,jpg,png,gif|required|max:500000'
                ]);
    
                $image_name_home_visit = time() . '.' . $image_service_home_visit->getClientOriginalExtension();
                $image_service_home_visit->move(public_path('images'), $image_name_home_visit);
            } 

            //validation icon learning center
            if($image_service_learning_center != '') {
                $request->validate([
                    'image_learning_center' => 'mimes:jpeg,jpg,png,gif|required|max:500000'
                ]);
    
                $image_name_learning_center = time() . '.' . $image_service_learning_center->getClientOriginalExtension();
                $image_service_learning_center->move(public_path('images'), $image_name_learning_center);
            } 

            DB::table('mau_price')
                ->where('id', $request->id)
                ->update([
                    'package_name' => $request->package_name,
                    'price' => $request->price,
                    'class_type' => $request->class_type,
                    'session_type' => $request->session_type,
                    'service_type' => $request->service_type,
                    'photo' => isset($image_name_online) ? $image_name_online : null,
                    'photo_home_visit' => isset($image_name_home_visit) ? $image_name_home_visit : null,
                    'photo_learning_center' => isset($image_name_learning_center) ? $image_name_learning_center : null,
                    'max_student' => $request->max_student,
                    'learning_duration' => $request->learning_duration,
                    'description' => $request->description,
                    'updated_at' => carbon::now()
                ]);

            Session::flash('flash_message','successfully update.');

            return redirect('/price');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('mau_price')->where('id', $id)->delete();

        Session::flash('flash_message', 'successfully delete.');

        return redirect('/price');
    }

    public function getPrice()
    {
        $data = array(
            "status" => 200,
            "response" => "success",
            "data" => DB::table('mau_price')
            ->select("*")
            ->get()
        );

        return $data;
    }
}
