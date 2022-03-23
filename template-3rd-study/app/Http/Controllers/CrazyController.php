<?php

namespace App\Http\Controllers;

use App\Hour;
use App\Content;
use App\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrazyController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth');
    // }


    public function index(Request $request)
    {
        $today = new Carbon();
        $today = Carbon::today();
        $hours = Hour::whereDate('date', $today)->sum('hour');
        $hours_int = (int)$hours;
        // dd($hours_int);

        $month = new Carbon();
        $month->month;
        $hours_month = Hour::whereMonth('date', $month)->sum('hour');
        $hours_month_int = (int)$hours_month;
        // dd($hours);

        $total = Hour::all()->sum('hour');
        $total_int = (int)$total;

        $js = Hour::where('content_id', 1)->sum('hour');
        $js_int = (int)$js;
        $css = Hour::where('content_id', 2)->sum('hour');
        $css_int = (int)$css;
        $php = Hour::where('content_id', 3)->sum('hour');
        $php_int = (int)$css;
        $html = Hour::where('content_id', 4)->sum('hour');
        $html_int = (int)$html;
        $laravel = Hour::where('content_id', 5)->sum('hour');
        $laravel_int = (int)$laravel;
        $sql = Hour::where('content_id', 6)->sum('hour');
        $sql_int = (int)$sql;
        $shell = Hour::where('content_id', 7)->sum('hour');
        $shell_int = (int)$shell;
        $info_base = Hour::where('content_id', 8)->sum('hour');
        $info_base_int = (int)$info_base;
        // dd($css_int);

        return view('index', compact('hours_int','hours_month_int','total_int',
                    'js_int','css_int','php_int','html_int','laravel_int','sql_int','shell_int','info_base_int'));
    }
}