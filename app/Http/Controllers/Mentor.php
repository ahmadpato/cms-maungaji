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
use App\MentorModel;


class Mentor extends Controller
{
    public function index(){
    	
    	$mentors = MentorModel::all();

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
        
        MentorModel::create([
            'no_certified' => $request->no_certified,
            'fullname' => $request->fullname,
            'experience' => $request->experience,
            'photo' => $image_name,
            'created_at' => Carbon::now()
        ]);

        Session::flash('flash_message','successfully saved.');

        return redirect('/mentor');
    }

    public function edit($id)
    {
        $mentors = MentorModel::find($id);
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
        
        $id = $request['id'];

        $mentor = MentorModel::find($id);
             
        $mentor['no_certified']   = $request['no_certified'];
        $mentor['fullname']       = $request['fullname'];
        $mentor['experience']     = $request['experience'];
        $mentor['photo']          = $image_name;
        $mentor['updated_at']     = carbon::now();
        $mentor->save();

        Session::flash('flash_message','successfully saved.');

        return redirect('/mentor');
    }

    public function destroy($id)
    {
        $mentor = MentorModel::find($id);

        $mentor->delete();

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
