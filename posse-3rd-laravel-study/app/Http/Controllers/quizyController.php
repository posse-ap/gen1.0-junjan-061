<?php

namespace App\Http\Controllers;

use App\Question;
use App\Theme;
use App\Choice;
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
        $questions = questions::all();
        dd($questions);
        return view('quizy.index', compact('questions'));
    }

    public function show($id)
    {

        $themes = Theme::where('question_id', $id)->get();
        // $theme = new Theme;
        // $items = $item->with('choices')->find($id);
        // $themes = $theme->with('themes')->find($id);
        // $themes = Theme::where('question_id' $id)->get();
        // dd($themes);
        $choices = Choice::get();
        // $choices = Choice::where('theme_id', $id)->get();
        // $items->get();
        // $items = Question::find($id)->choices;
        // dd($items['choices']);
        // echo $items;
        return view('quizy.show', compact('themes','choices'));
    }

    public function create(Request $request)
    {
        return view('quizy.rest');
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
