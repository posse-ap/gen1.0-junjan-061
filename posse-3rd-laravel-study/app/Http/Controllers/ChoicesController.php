<?php

namespace App\Http\Controllers;

use App\Question;
use App\Choice;
use Illuminate\Http\Request;


class ChoicesController extends Controller
{
    // public function index(Request $request)
    // {
    //     Question::with('choices')->find(1)->choices[0]->name;
    //     $items = Choice::with('question')->get();
    //     return view('quizy.show', compact('items'));
    // }

    public function index(Request $request, int $question_id)
    {
        // Question::with('choices')->find(1)->choices[0]->name;
        $items = Choice::with('question')->find(1);
        return view('quizy.show', ['id'=>$question_id], compact('items'));
    }
}
