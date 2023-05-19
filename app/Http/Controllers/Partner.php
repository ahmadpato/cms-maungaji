<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\File;
use App\UploadedFile;
use App\Users;
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
use App\PartnerModel;

class Partner extends Controller
{
    public function index(){
        $partner = PartnerModel::all();
        return view('partner/partner',['partner' => $partner]);
    }

    public function create(){
        
        return view('partner/add_partner');
    }

    public function store(Request $request){

        $image = $request->file('image');
        if($image != ''){
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:500000',
                'url' => 'required',
                'description' => 'required'
            ]);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        } 
        
        PartnerModel::create([
            'photo' => $image_name,
            'url' => $request['url'],
            'description' => $request['description'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Session::flash('flash_message', 'successfully saved.');

        return redirect('/partner');
    }

    public function edit($id)
    {
        $partner = PartnerModel::find($id);
        return view('partner/edit_partner', ['partner' => $partner]);
    }

    public function update(Request $request){

        $image_name = $request->image;
        $image = $request->file('image');
        
        if($image != '') {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:500000',
                'url' => 'required',
                'description' => 'required'
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);

        } 
        $id = $request['id'];
        
        $partner = PartnerModel::find($id);
             
        $partner['photo']       = $image_name;
        $partner['url']         = $request['url'];
        $partner['description'] = $request['description'];
        $partner['updated_at']  = carbon::now();
        $partner->save();

        Session::flash('flash_message','successfully update.');

        return redirect('/partner');
    }

    public function destroy($id){
    
        $partner = PartnerModel::find($id);

        $partner->delete();

        Session::flash('flash_message', 'successfully delete.');

        return redirect('/partner');
    }

    public function getpartner(){
        $data = array(
            "status" =>200,
            "response" => "success",
            "data" =>DB::table('mau_partner')
            ->select('*')
            ->get()
        );

        return $data;
    }
}
