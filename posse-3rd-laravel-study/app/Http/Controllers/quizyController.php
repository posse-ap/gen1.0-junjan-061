<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class quizyController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function index($id='noname')
    {
    if (isset($request->id))
    {
        $param = ['id' => $request->id];
        $items = DB::select('select * from questions where id = :id',
            $param);
    } else {
        $items = DB::select('select * from questions');
    }
    return view('quizy.shows', ['items' => $items]);
    }
    // public function index2()
    // {
    //     return view('quizy.quizy2');
    // }
}

