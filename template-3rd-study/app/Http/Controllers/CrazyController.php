<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Language_hour;
use App\Content_hour;
use App\User;
use App\Content;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Language;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class CrazyController extends Controller
{    // public function __construct(){    //     $this->middleware('auth');

    // }

    public function news()
    {
        $url = 'https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default/news';
        $client = new Client();
        $response = $client->request('GET', $url)->getBody()->getContents();
        $json = json_decode($response);

        return view('news', ['blogs' => $json]);
    }

    public function detail($id)
    {
        $url = 'https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default/news/' .$id ;
        $client = new Client();
        $response = $client->request('GET', $url)->getBody()->getContents();
        $json = json_decode($response);
        $detail = $json;
        // dd($detail);
        return view('detail', ['detail' => $detail]);
    }


    public function index(Request $request)
    {
        $contents = Content::all();
        $languages = Language::all();
        $language_chart_array = "['Language', 'Hour']";
        $language_chart_color = "";

        $content_chart_array = "['Contents', 'Hour']";
        $content_chart_color = "";

        foreach ($languages as $index => $language) {
            $language_hour =  (float)(Language_hour::where('language_id', $language->id)->where('user_id',  Auth::user()->id)->sum('hour'));
            $language_chart_array.= ",[\"$language->language\", $language_hour]";
            $language_chart_color.= " $index: {color: '$language->color'},";
        }
        $language_chart = $language_chart_array;
        
        foreach ($contents as $index => $content) {
            $content_hour =  (float)(Content_hour::where('content_id', $content->id)->where('user_id',  Auth::user()->id)->sum('hour'));
            $content_chart_array.= ",[\"$content->contents\", $content_hour]";
            $content_chart_color.= " $index: {color: '$content->color'},";
        }
        
        $content_chart = $content_chart_array;
        // dd($language_chart);
        
        // 今日の言語学習時間のトータルを出す処理
        $today = new Carbon();
        $today = Carbon::today();
        $Language_hour = Language_hour::whereDate('date', $today)->sum('hour');
        $Language_hour_today_float = (float)$Language_hour;

        // 当月の言語学習時間のトータルを出す処理
        $month = new Carbon();
        $month->month;
        $hour_month = Language_hour::whereMonth('date', $month)->sum('hour');
        $Language_hour_month_float = (float)$hour_month;

         // 言語学習時間の総計を出す処理
        $Language_total = language_hour::all()->sum('hour');
        $Language_total_float = (float)$Language_total;

        // 今日のコンテンツ学習時間のトータルを出す処理
        $Content_hour = Content_hour::whereDate('date', $today)->sum('hour');
        $Content_hour_today_float = (float)$Content_hour;

        // 当月のコンテンツの学習時間を出す処理
        $month = new Carbon();
        $month->month;
        $hour_month = Content_hour::whereMonth('date', $month)->sum('hour');
        $Content_hour_month_float = (float)$hour_month;

         // コンテンツ学習時間の総計を出す処理
        $Content_total = language_hour::all()->sum('hour');
        $Content_total_float = (float)$Language_total;

        // 今日の合計
        $day_total = $Language_hour_today_float + $Content_hour_today_float;
        // dd($total);
        
        // 当月の合計
        $month_total = $Language_hour_month_float + $Content_hour_month_float;

        // すべての合計
        $total = $Language_total_float + $Content_total_float;

        $js = Language_hour::where('language_id', 1)->sum('hour');
        $js_float = (float)$js;
        $css = Language_hour::where('language_id', 2)->sum('hour');
        $css_float = (float)$css;
        $php = Language_hour::where('language_id', 3)->sum('hour');
        $php_float = (float)$css;
        $html = Language_hour::where('language_id', 4)->sum('hour');
        $html_float = (float)$html;
        $laravel = Language_hour::where('language_id', 5)->sum('hour');
        $laravel_float = (float)$laravel;
        $sql = Language_hour::where('language_id', 6)->sum('hour');
        $sql_float = (float)$sql;
        $shell = Language_hour::where('language_id', 7)->sum('hour');
        $shell_float = (float)$shell;
        $info_base = Language_hour::where('language_id', 8)->sum('hour');
        $info_base_float = (float)$info_base;
        $nyobi = Content_hour::where('content_id', 1)->sum('hour');
        $nyobi_float = (float)$nyobi;
        $dot = Content_hour::where('content_id', 2)->sum('hour');
        $dot_float = (float)$dot;
        $posse = Content_hour::where('content_id', 3)->sum('hour');
        $posse_float = (float)$posse;

        return view('index2', compact(
            'contents',
            'languages',
            'day_total',
            'month_total',
            'total',
            'Language_total_float',
            'Content_total_float',
            'js_float',
            'css_float',
            'php_float',
            'html_float',
            'laravel_float',
            'sql_float',
            'shell_float',
            'info_base_float',
            "nyobi_float",
            "dot_float",
            "posse_float",
            'language_chart',
            'language_chart_color',
            'content_chart',
            'content_chart_color',
        ));
    }

    public function admin(Request $request)
    {
        $users = new User();
        $users = User::all();
        $contents = new Content();
        $contents = Content::all();
        $languages = new Language();
        $languages = Language::all();
        return view('admin', compact('users','contents','languages'));
    }

    public function update_user(Request $request, $user_id)
    {
        $users = User::find($user_id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();
        return redirect("/webapp/admin");
    }

    public function destroy_user(Request $request, $user_id)
    {
        $user = User::find($user_id)->delete();
        return redirect('/webapp/admin');
    }


    public function store_language(Request $request)
    {
        $language = new Language;
        $form = $request->all();
        unset($form['_token']); 
        $language->fill($form)->save();
        return redirect('/webapp/admin');
    }

    public function update_language(Request $request, $language_id)
    {
        $Languages = Language::find($language_id);
        $Languages->language = $request->language;
        $Languages->save();
        return redirect("/webapp/admin");
    }

    public function destroy_language(Request $request, $language_id)
    {
        $Language = Language::find($language_id)->delete();
        return redirect('/webapp/admin');
    }

    public function store_content(Request $request)
    {
        $content = new Content;
        $form = $request->all();
        unset($form['_token']); 
        $content->fill($form)->save();
        return redirect('/webapp/admin');
    }

    public function update_content(Request $request, $content_id)
    {
        $contents = Content::find($content_id);
        $contents->contents = $request->contents;
        $contents->save();
        return redirect("/webapp/admin");
    }

    public function destroy_content(Request $request, $content_id)
    {
        $contents = Content::find($content_id)->delete();
        return redirect('/webapp/admin');
    }

    public function add(Request $request)
    {
        // $languages = $request->languages;
        // foreach($languages as $language){
        //     $language_post = Language_Hour::create([
        //         'study_hours_post_id' => 999,
        //         'language_id' => $language,
        //         'date' => $request->date,
        //         'hour' => 10,
        //     ]);
        // }

        // dd(Auth::user()->id);
        // テーブルを学習コンテンツと学習言語に分ける
        // -migrationとseederを分ける
        // dd($request);
        // dd($request->language_id);
        $study_languages = count($request->language_id);
        $study_language_time = $request->hour / $study_languages;
        foreach ($request->language_id as $language) {
            Language_hour::create([
                'date' => $request->date,
                'hour' => $study_language_time,
                'language_id' => $language,
                'user_id' => Auth::user()->id
            ]);
        }
        // dd($request->content_id);
        $study_contents = count($request->content_id);
        $study_content_time = $request->hour / $study_contents;
        foreach ($request->content_id as $content) {
            Content_hour::create([
                'date' => $request->date,
                'hour' => $study_content_time,
                'content_id' =>  $content,
                'user_id' => Auth::user()->id
            ]);
        }

        return redirect('webapp');
    }
}
