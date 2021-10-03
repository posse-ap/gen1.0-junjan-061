<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class quizyController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $items = questions::all();
        return view('quizy.index', ['items' => $items]);
    }


    public function show($id)
    {
        $item = new Question;
        $items = $item->with('choices')->find($id);
        // $items->get();
        // $items = Question::find($id)->choices;
        // dd($items['choices']);
        // echo $items;
        return view('quizy.show', compact('items'));
    }


    public function menu()
    {
        // ログインしていたら、test/menuを表示
        if (Auth::check()) {
            return view('/quiz');
        } else {
            // ログインしていなかったら、Login画面を表示
            return view('auth/login');
        }
    }
    // public function sort(Request $request){
    //     $params = ['id' => $request->id];
    //     $items = DB::select( $params);
    //     return view('quizy.show',['items' => $items]);
    // }

}
