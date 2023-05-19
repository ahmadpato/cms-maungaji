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
use App\FaqModel;

class Faq extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = FaqModel::all();
        
        return view('faq/faq',['faq' => $faq]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faq/add_faq');
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
            $this->validate($request,[
                'question' => 'required',
                'answer' => 'required'
            ]);

            FaqModel::create([
                'question' => $request->question,
                'answer' => $request->answer,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Session::flash('flash_message', 'succesfully saved.');

            return redirect('/faq');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = FaqModel::find($id);
        return view('faq/edit_faq', ['faq' => $faq]);
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
            $this->validate($request,[
                'question' => 'required',
                'answer' => 'required'
             ]);

             $id = $request['id'];

             $faq = FaqModel::find($id);
             
             $faq['question']   = $request['question'];
             $faq['answer']     = $request['answer'];
             $faq['updated_at'] = carbon::now();
             $faq->save();

            Session::flash('flash_message','successfully update.');

            return redirect('/faq');
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
        $faq = FaqModel::find($id);

        $faq->delete();

        Session::flash('flash_message', 'successfully delete.');

        return redirect('/faq');
    }

    public function getFaq()
    {
        $data = array(
            "status" => 200,
            "response" => "success",
            "data" => DB::table('cms_faq')
            ->select("*")
            ->get()
        );

        return $data;
    }
}
