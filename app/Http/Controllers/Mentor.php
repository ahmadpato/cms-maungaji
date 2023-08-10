<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\File;
use App\UploadedFile;
use App\mentors;
use App\Groups;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Mentor extends Controller
{
    public function index(){
    	
    	$mentors = DB::table('mentors')
        ->select('*')
        ->orderBy('fullname', 'ASC')
        ->get();

    	return view('mentor/mentor',['user' => $mentors]);
    }

    public function export_excel()
	{
		return Excel::download(new UserExport, 'user.xlsx');
	}

    public function add(){
    	return view('mentor/add');
    }

    public function store(Request $request)
    {
        $image_name = $request->image;
        $image = $request->file('image');
        
        if($image != '')
        {
            $request->validate([
                'no_certified' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:1500000'
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        } else {
            $request->validate([
                'no_certified' => 'required',
            ]);
        }
        
        // $input['no_certified'] = Input::get('no_certified');

        // $rules = array('no_certified' => 'unique:mentors,no_certified');
        // $validator = Validator::make($input, $rules);

        // if ($validator->fails()) {
        //     Session::flash('failed',' failed add data, number identity already use');
        //     return redirect('/mentor'.$request->id.'');
        // } else {
        DB::table('mentors')->insert([
            'no_certified' => $request->no_certified,
            'fullname' => $request->fullname,
            'experience' => $request->experience,
            'photo' => $image_name,
            'created_at' => Carbon::now()
        ]);
        // }

        Session::flash('flash_message','successfully saved.');

        return redirect('/mentor');
    }

    public function edit($id)
    {
        //mengambil data user berdasarkan id yang dipilih
        $mentors = DB::table('mentors')
            ->select('*')
            ->where('id',$id)
            ->get();
        
        // passing data edit user yang didapat ke view edit.blade.php
        return view('/mentor/edit',['mentors' => $mentors]);
    }

    public function update(Request $request)
    {   
        $image_name = $request->image;
        $image = $request->file('image');
        
        if($image != '') {
            $request->validate([
                'no_certified' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:1500000'
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);

        } 
        
        DB::table('mentors')
            ->where('mentors.id',$request->id)
            ->update([
                'no_certified' => $request->no_certified,
                'fullname' => $request->fullname,
                'experience' => $request->experience,
                'photo' => $image_name,
                'updated_at' => Carbon::now()
        ]);

        Session::flash('flash_message','successfully saved.');

        return redirect('/mentor');
    }

    public function destroy($id)
    {
        DB::table('mentors')->where('id',$id)->delete();

        Session::flash('flash_message','successfully delete.');
            
        return redirect('/mentor');
    }

    public function getUser(){
        $data = array(
            "status" =>200,
            "response" => "success",
            "data" =>DB::table('mentors')
            ->select('*')
            ->whereNotNull('photo')
            ->where('Status', 'Active')
            ->orderBy('fullname', 'ASC')
            ->get()
        );

        return $data;
    }
}
