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

class Dashboard extends Controller
{
    public function index(){

        $dashboard2023 = DB::table('mau_monthly_report')
        ->select('count')
        ->where('year', '2023')
        ->orderBy('year', 'DESC')
        ->get();

        $dashboard2022 = DB::table('mau_monthly_report')
        ->select('count')
        ->where('year', '2022')
        ->orderBy('year', 'DESC')
        ->get();

        $dashboard2021 = DB::table('mau_monthly_report')
        ->select('count')
        ->where('year', '2021')
        ->orderBy('year', 'DESC')
        ->get();

        $dashboard2020 = DB::table('mau_monthly_report')
        ->select('count')
        ->where('year', '2020')
        ->orderBy('year', 'DESC')
        ->get();

        $dashboardyear2023 = DB::table('mau_monthly_report')
        ->where('year', '2023')
        ->orderBy('year', 'DESC')
        ->sum('count');

        $dashboardyear2022 = DB::table('mau_monthly_report')
        ->where('year', '2022')
        ->orderBy('year', 'DESC')
        ->sum('count');

        $dashboardyear2021 = DB::table('mau_monthly_report')
        ->where('year', '2021')
        ->orderBy('year', 'DESC')
        ->sum('count');

        $dashboardyear2020 = DB::table('mau_monthly_report')
        ->where('year', '2020')
        ->orderBy('year', 'DESC')
        ->sum('count');

        $countall = DB::table('mau_monthly_report')
        ->select(DB::raw('SUM(count) AS count'))
        ->get()->toArray();

        $countall = array_column($countall, 'count');

        $count2023 = DB::table('mau_monthly_report')
        ->select(DB::raw('SUM(count) AS count'))
        ->where('year', '2023')
        ->get()->toArray();

        $count2023 = array_column($count2023, 'count');

        $count2022 = DB::table('mau_monthly_report')
        ->select(DB::raw('SUM(count) AS count'))
        ->where('year', '2022')
        ->get()->toArray();

        $count2022 = array_column($count2022, 'count');

        $count2021 = DB::table('mau_monthly_report')
        ->select(DB::raw('SUM(count) AS count'))
        ->where('year', '2021')
        ->get()->toArray();

        $count2021 = array_column($count2021, 'count');

        $count2020 = DB::table('mau_monthly_report')
        ->select(DB::raw('SUM(count) AS count'))
        ->where('year', '2020')
        ->get()->toArray();
        
        $count2020 = array_column($count2020, 'count');
        
        return view('dashboard',[
            'dashboardyear2023' => $dashboardyear2023,
            'dashboardyear2022' => $dashboardyear2022,
            'dashboardyear2021' => $dashboardyear2021,
            'dashboardyear2020' => $dashboardyear2020,
            'dashboard2023' => $dashboard2023,
            'dashboard2022' => $dashboard2022,
            'dashboard2021' => $dashboard2021,
            'dashboard2020' => $dashboard2020,
            'countall'  => $countall,
            'count2023' => $count2023,
            'count2022' => $count2022,
            'count2021' => $count2021,
            'count2020' => $count2020
        ]);
    }
}
