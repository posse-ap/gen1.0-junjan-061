<?php

namespace App\Http\Controllers;

// use App\Question;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class quizyController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $items = questions::all();
        return view('quizy.index', ['items' => $items]);
    }


    public function show(Request $request)
    {
        $items = choices::all();
        return view('quizy.show', ['items' => $items]);
    }
}

