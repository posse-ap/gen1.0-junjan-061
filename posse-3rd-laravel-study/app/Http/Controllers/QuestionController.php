<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $items = Question::all();
        return view('quizy.index', ['items' => $items]);
    }
}