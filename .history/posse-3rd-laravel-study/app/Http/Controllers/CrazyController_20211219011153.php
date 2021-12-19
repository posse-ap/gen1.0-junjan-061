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
        // 問題タイトルの編集用の関数
        // $theme = new Theme;
        // $items = $item->with('choices')->find($id);
        // $themes = $theme->with('themes')->find($id);
        // $themes = Theme::where('question_id' $id)->get();
        // dd($themes);
        // $choices = Choice::get();
        // $choices = Choice::where('theme_id', $id)->get();
        // $items->get();
        // $items = Question::find($id)->choices;
        // dd($items['choices']);
        // echo $items;
        return view('quizy.title', compact('questions'));
    }

    public function edit_theme($question_id)
    {
        $questions = Question::all();
        $themes = Theme::where('question_id', $question_id)->get();
        // 設問の編集用の関数
        // $theme = new Theme;
        // $items = $item->with('choices')->find($id);
        // $themes = $theme->with('themes')->find($id);
        // $themes = Theme::where('question_id' $id)->get();
        // dd($themes);
        // $choices = Choice::get();
        // $choices = Choice::where('theme_id', $id)->get();
        // $items->get();
        // $items = Question::find($id)->choices;
        // dd($items['choices']);
        // echo $items;
        return view('quizy.theme', compact('questions','themes'));
    }

    public function update_theme(Request $request, $theme_id)
    {
        $themes = Theme::find($theme_id);
        // $questions = Question::all();
        // $themes = Theme::where('question_id', $question_id)->get();
        $themes->image = $request->image;
        $themes->timestamps = false;  
        $themes->save();

        // $theme = Theme::find($question_id);
        // Theme::where('question_id', $question_id)->get();
        // $theme->name = $request->name;
        // $theme->timestamps = false;  
        // $theme->save();

        
        // $choice = Choice::find($theme_id);
        // $choices = Choice::where('theme_id', $theme_id)->get();
        // $choice->name = $request->name;
        // $choice->timestamps = false;  
        // $choice->save();
        return redirect("/admin");
    }

    public function edit_choice(Request $request, $theme_id)
    {
        // $questions = Question::find($question_id);
        $questions = Question::all();
        // $themes = Theme::where('question_id', $question_id)->get();
        $themes = Theme::all();
        // $theme = new Theme;
        // $items = $item->with('choices')->find($id);
        // $themes = $theme->with('themes')->find($id);
        // $themes = Theme::where('question_id' $id)->get();
        // dd($themes);
        $choices = Choice::where('theme_id', $theme_id)->get();
        // $question = Question::find($id);
        // return view('quizy.edit',['form' => $question]);

        // $theme = new Theme;
        // $themes = $theme->with('themes')->find($id);

        // $choice = new Question;
        // $choices = $choice->with('choices')->find($id);

        // dd($question);
        return view('quizy.choice',compact('questions','themes','choices'));
    }


    public function update_choice(Request $request, $theme_id)
    {
        $choices = Choice::find($theme_id);
        // $questions = Question::all();
        // $themes = Theme::where('question_id', $question_id)->get();
        $choices->name = $request->name;
        $choices->timestamps = false;  
        $choices->save();

        // $theme = Theme::find($question_id);
        // Theme::where('question_id', $question_id)->get();
        // $theme->name = $request->name;
        // $theme->timestamps = false;  
        // $theme->save();

        
        // $choice = Choice::find($theme_id);
        // $choices = Choice::where('theme_id', $theme_id)->get();
        // $choice->name = $request->name;
        // $choice->timestamps = false;  
        // $choice->save();
        return redirect("/admin/theme");
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
    public function store(Request $request)
    {
        $question = new Question;
        $form = $request->all();
        unset($form['_token']);
        $question->timestamps = false;  
        $question->fill($form)->save();
        return redirect('/admin');
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
    public function edit_title(Request $request, $question_id, $theme_id)
    {
        $questions = Question::find($question_id);
        // dd($questions);
        $themes = Theme::where('question_id', $question_id)->get();
        // $theme = new Theme;
        // $items = $item->with('choices')->find($id);
        // $themes = $theme->with('themes')->find($id);
        // $themes = Theme::where('question_id' $id)->get();
        // dd($themes);
        $choices = Choice::where('theme_id', $theme_id)->get();
        // $question = Question::find($id);
        // return view('quizy.edit',['form' => $question]);

        // $theme = new Theme;
        // $themes = $theme->with('themes')->find($id);

        // $choice = new Question;
        // $choices = $choice->with('choices')->find($id);

        // dd($question);
        return view('quizy.choice',compact('questions','themes','choices'));
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

        // $theme = Theme::find($question_id);
        // Theme::where('question_id', $question_id)->get();
        // $theme->name = $request->name;
        // $theme->timestamps = false;  
        // $theme->save();

        
        // $choice = Choice::find($theme_id);
        // $choices = Choice::where('theme_id', $theme_id)->get();
        // $choice->name = $request->name;
        // $choice->timestamps = false;  
        // $choice->save();
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
