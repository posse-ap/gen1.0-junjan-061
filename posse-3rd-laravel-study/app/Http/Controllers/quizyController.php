<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class quizyController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index()
    {
        return view('quizy.quizy1');
    }


    public function index2()
    {
        return view('quizy.quizy2');
    }
}

