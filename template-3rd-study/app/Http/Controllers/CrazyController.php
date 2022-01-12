<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrazyController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }
}
