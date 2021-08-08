<?php

namespace App\Http\Controllers;

use App\Choice;
use Illuminate\Http\Request;


class ChoicesController extends Controller
{
    public function index(Request $request)
    {
        $items = Choice::with('choices')->get();
        return view('choice.index', ['items->$items']);
    }
}
