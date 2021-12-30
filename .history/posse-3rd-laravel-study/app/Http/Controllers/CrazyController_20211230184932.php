<?php

namespace App\Http\Controllers;

use App\Choice;
use App\Question;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CrazyController extends Controller
{
    public function index(Request $request)
    {
        // $questions = Question::all();
        $questions = Question::all();
        $themes = Theme::all();
        return view('quizy.admin', compact('questions','themes'));
    }

    public function show($question_id)
    {
        $questions = Question::find($question_id);
        $themes = Theme::where('question_id', $question_id)->get();
        return view('quizy.title', compact('questions'));
    }

    public function edit_theme($question_id)
    {
        // 設問の編集用の関数
        $themes = Theme::where('question_id', $question_id)->get();
        return view('quizy.theme', compact('themes'));
    }

    public function update_theme(Request $request, $theme_id)
    {
        $themes = Theme::find($theme_id);
        $themes->image = $request->image;
        $themes->timestamps = false;  
        $themes->save();
        return redirect("/admin");
    }

    public function edit_choice(Request $request, $theme_id)
    {
        $choices = Choice::where('theme_id', $theme_id)->get();
        // dd($choices);
        return view('quizy.choice',compact('choices'));
    }


    public function update_choice(Request $request, $theme_id)
    {
        $choices = Choice::find($theme_id);
        $choices->name = $request->name;
        $choices->valid = $request->valid;
        $choices->timestamps = false;  
        $choices->save();
        return redirect("/admin/choice/{}");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quizy.admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_title(Request $request)
    {
        $question = new Question;
        $form = $request->all();
        unset($form['_token']);
        $question->timestamps = false;  
        $question->fill($form)->save();
        return redirect('/admin');
    }

    public function store_theme(Request $request)
    {
        $theme = new Theme;
        $form = $request->all();
        unset($form['_token']);
        $theme->timestamps = false;  
        $theme->fill($form)->save();
        return redirect('/admin');
    }

    public function store_choice(Request $request)
    {
        $choice = new Choice;
        $form = $request->all();
        unset($form['_token']);
        $choice->timestamps = false;  
        $choice->fill($form)->save();
        return redirect('/admin/choice/{theme_id}');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_title(Request $request, $question_id)
    {
        $questions = Question::find($question_id);
        return view('quizy.title',compact('questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_title(Request $request, $question_id)
    {
        $questions = Question::find($question_id);
        $questions->name = $request->name;
        $questions->timestamps = false;  
        $questions->save();
        return redirect("/admin");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id)->delete();
        return redirect('/admin');
    }

}
