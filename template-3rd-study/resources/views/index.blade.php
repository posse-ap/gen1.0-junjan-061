<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Webアプリケーション</title>
	{{-- <link rel="stylesheet" href="webapp.css"> --}}
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
	integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<!-- ヘッダー -->
	<header>
		<div class="header_left">
			<img src="https://raw.githubusercontent.com/posse-ap/gen1.0-ph1-posseapp/hayashi/posseLogotouka.png"
				alt="posse_logo" class="posse_logo">
			<span class="header_left_text">4th week</span>
		</div>
		<div class="header_right">
			<button class="header_button pc" id="open_modal_pc">記録・投稿</button>
			<button type="button" class="header_button pc" onclick="location.href='{{ route( 'admin' )}}'"
			data-target="#exampleModal">アカウント管理</button>
		</div>

	</header>

	<!-- メインコンテンツ -->
	<main>
		<div class="main">
			<!-- mainの左側 -->
			<div class="left">
				<!-- today部分 -->
				<div class="left_box">
					<div class="box">
						<p class="today">Today</p>
						
						{{-- 今日の日付の合計学習時間を出力 --}}
							<p class="hour_number" style="color: red">
								{{$hours_int}}
							</p>
						
						<p class="hour">hour</p>
					</div>
					<!-- month部分 -->
					<div class="box">
						<p class="month">Month</p>
						{{-- 1か月の合計を出力 --}}
						<p class="hour_number" style="color: red">
							{{$hours_month_int}}
						</p>
						
						<p class="hour">hour</p>
					</div>
					<!-- total部分-->
					<div class="box">
						<p class="total">Total</p>
						<p class="hour_number" style="color: red">
						{{-- 全ての合計を出力 --}}
						{{$total_int}}
						</p>
						<p class="hour">hour</p>
					</div>
				</div>
				<!-- ３box下のgraph部分 -->
				<!-- <img src="./image/graph1.png" alt="棒グラフ" class="hour_graph"> -->
				<div class="hour_graph_whole">
					<div id="chart_div" class="hour_graph"></div>
				</div>
			</div>

			<!-- mainの右側 -->
			<div class="right">
				<!-- 学習言語right1 -->
				<div class="right_box">
					<div class="right_contents">
						<h3 class="right_box_titles">学習言語</h3>
						<!-- 学習言語の円グラフ -->
						<div id="chart_languages" class="chart circle_graph1"></div>
						<!-- 言語の詳細 -->
						<div class="study_languages">
							<section class="study_items"><span class="circle" id="i_color1754EF"></span>JavaScrpt
							</section>
							<section class="study_items"><span class="circle" id="i_color1071BD"></span>CSS</section>
							<section class="study_items"><span class="circle" id="i_color20BEDE"></span>PHP</section>
							<section class="study_items"><span class="circle" id="i_color3CCEFE"></span>HTML</section>
							<section class="study_items"><span class="circle" id="i_colorB29EF3"></span>Laravel
							</section>
							<section class="study_items"><span class="circle" id="i_color6D46EC"></span>SQL</section>
							<section class="study_items"><span class="circle" id="i_color4A18EF"></span>SHELL</section>
							<section class="study_items"><span class="circle" id="i_color3105C0"></span>情報システム基礎知識（その他）
							</section>
						</div>
					</div>

					<!-- 学習コンテンツ right2 -->
					<div class="right_contents">
						<h3 class="right_box_titles">学習コンテンツ</h3>
						<!-- 学習コンテンツの円グラフ -->
						<div id="chart_contents" class="chart circle_graph2"></div>
						<div>
							<section class="study_contents"><span class="circle" id="s_color1754EF"></span>ドットインストール
							</section>
							<section class="study_contents"><span class="circle" id="s_color1071BD"></span>N予備校
							</section>
							<section class="study_contents"><span class="circle" id="s_color20BEDE"></span>POSSE課題
							</section>
						</div>
					</div>
				</div>
			{{-- {{dd($css_int)}} --}}
			</div>
			<!-- スマホ版のフッターと記録・投稿ボタン -->
			<footer class="footer sp">
				<h5 class="footer_text sp">＜ 2021年 10月 ＞</h5>
			</footer>
			<div class="sp">
				<button class="header_button sp" id="open_modal_sp">記録・投稿</button>
			</div>
			<!-- この中はpc版では見えてない -->
		</div>
	</main>
	<!--モーダル -->
	<div id="modal_area" class="modal_area">
		<div id="close_modal" class="close_modal">×</div>
		<!-- モーダルのメイン部分 -->
		<div class="modal_main" id="modal_main">

			<!-- モーダルの左側 -->
			<div class="modal_left">
				<!-- 学習日 -->
				<div class="modal_day">
					<h3 class="title">学習日</h3>
					<input type="text" class="modal_day_input" id="study_day">
				</div>
				<!-- 学習コンテンツ -->
				<div class="modal_study_contents">
					<h3 class="title">学習コンテンツ（複数選択可）</h3>
					<form class="modal_study_contents_all" name="study_contents">
						<label class="modal_study_contents_check" name="checked" value="グレー"><input type="checkbox" class="Checkbox"
								id="c_box1" onclick="chebg('c_box1')"><span
								class="check_content Checkbox-fontas">N予備校</span></label>
						<label class="modal_study_contents_check" name="checked" value="グレー"><input type="checkbox" class="Checkbox"
								id="c_box2" onclick="chebg('c_box2')"><span
								class="check_content Checkbox-fontas">ドットインストール</span></label>
						<label class="modal_study_contents_check" name="checked" value="グレー"><input type="checkbox" class="Checkbox"
								id="c_box3" onclick="chebg('c_box3')"><span
								class="check_content Checkbox-fontas">POSSE課題</span></label>
					</form>
				</div>
				<!-- 学習言語 -->
				<div class="modal_study_languages">
					<h3 class="title">学習コンテンツ（複数選択可）</h3>
					<form class="modal_study_languages_all" name="study_languages">
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box4" onclick="chebg('c_box4')"><span
								class="check_language Checkbox-fontas">HTML</span></label>
						<label class="modal_study_languages_check " name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box5" onclick="chebg('c_box5')"><span
								class="check_language Checkbox-fontas">CSS</span></label>
						<label class="modal_study_languages_check " name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box6" onclick="chebg('c_box6')"><span
								class="check_language Checkbox-fontas">JavaScrpt</span></label>
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box7" onclick="chebg('c_box7')"><span
								class="check_language Checkbox-fontas">PHP</span></label>
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box8" onclick="chebg('c_box8')"><span
								class="check_language Checkbox-fontas">Laravel</span></label>
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box9" onclick="chebg('c_box9')"><span
								class="check_language Checkbox-fontas">SQL</span></label>
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box10" onclick="chebg('c_box10')"><span
								class="check_language Checkbox-fontas">SHELL</span></label>
						<label class="modal_study_languages_check" name="checked" value="グレー"><input type="checkbox"
								class="Checkbox" id="c_box11" onclick="chebg('c_box11')"><span
								class="check_language Checkbox-fontas">情報システム基礎知識（その他）</span></label>
					</form>
				</div>
			</div>

			

			<!-- モーダルの右側 -->
			<div class="modal_right">
				<div class="modal_hour">
					<h3 class="title">学習時間</h3>
					<input type="text" name="" class="modal_hour_input" id="study_hour">
				</div>

				<div class="modal_tweeter_comnent">
					<h3 class="title">Twitter用コメント</h3>
					<textarea id="tweet_box" class="modal_twitter_textarea" name="texts"></textarea>
				</div>

				<div class="twitter">
					<label class="twitter_label"><input type="checkbox" class="Checkbox tw" id="twitter_check_box"
							checked><span class="twitter_check Checkbox-fontas">Twitterにシェアする</span>
					</label>
				</div>
			</div>
			<div class="modal_footer sp">
				<button class="modal_footer_btn" id="tweet2">記録・投稿</button>
			</div>
		</div>
		<!-- ロード画面（記録・投稿ボタンをクリック時に出現 -->
		<div class="load" id="load">
			<svg id="loading" width="100" height="100" viewBox="0 0 100 100">
				<circle cx="50" cy="50" r="40" />
			</svg>
			<img id="loaded" src="./image/awesome.png" alt="" class="awesome">
		</div>
		<!-- モーダルのフッター -->
		<div class="modal_footer pc">
			<button class="modal_footer_btn" id="tweet1">記録・投稿</button>
		</div>
	</div>
	<!-- フッター -->
	<div id="overlay" class=""></div>
	<footer class="footer pc">
		<h5 class="footer_text">＜ 2021年 10月 ＞</h5>
	</footer>

    {{-- <script src="{{ asset('assets/js/index.js') }}"></script> --}}
<script>

'use strict';


//ファーストビューの記録・投稿ボタンを押した時の処理
var showBtn1 = document.getElementById('open_modal_pc');//pc版
var showBtn2 = document.getElementById('open_modal_sp');//sp版
var closeBtn = document.getElementById('close_modal');
var popup = document.getElementById('modal_area');//モーダル
var overlay = document.getElementById('overlay');//モーダル出現時のグレー背景

//pc版(ファーストビューにある記録投稿ボタンをクリック時にモーダルとその後ろのグレー背景を表示)
showBtn1.addEventListener('click', function () {
    popup.classList.add('show');
    overlay.classList.add('overlay');
});
//sp版(ファーストビューにある記録投稿ボタンをクリック時にモーダルとその後ろのグレー背景を表示)
showBtn2.addEventListener('click', function () {
    popup.classList.add('show');
    overlay.classList.add('overlay');
});


// モーダル画面内の処理

// カレンダー（学習日のインプットタグの中にflatpickerでカレンダーを読み込む）
var study_day = document.getElementById('study_day');
var fp = flatpickr(study_day, {
    enableTime: true,
    dateFormat: "Y-m-d",// フォーマットの変更
});

//チェック時に背景色を変更
function chebg(chkID){
    var  Myid=document.getElementById(chkID);
    if(Myid.checked){
    Myid.parentNode.style.backgroundColor = '#C6E5FF';
}else{Myid.parentNode.style.backgroundColor = '#f4f5f9';}
    };

var modal_main = document.getElementById('modal_main');//モーダルのメイン部分
var load = document.getElementById('load');//ロード
var loading = document.getElementById('loading');//ローディング中画像
var loaded = document.getElementById('loaded');//ロード完了画像
var tweet1 = document.getElementById('tweet1');//pc版
var tweet2 = document.getElementById('tweet2');//sp版
var twitter_check_box = document.getElementById('twitter_check_box');//Twitter用コメント
var input = document.getElementsByTagName('input');

//pc版（モーダルないの記録投稿ボタンをクリック時にローディング画面を表示するとともに約3秒ごにロード完了画面、twitter_checked関数を発火させる）
tweet1.addEventListener('click', function () {
    modal_main.classList.add('in_show');
    load.classList.add('show_load');
    tweet1.classList.add('in_show');

    setTimeout(() => {
        loading.classList.add('in_show');
        loaded.style.display = 'block';
        twitter_checked();
    }, 3300);
});

//sp版（モーダルないの記録投稿ボタンをクリック時にローディング画面を表示するとともに約3秒ごにロード完了画面、twitter_checked関数を発火させる）
tweet2.addEventListener('click', function () {
    modal_main.className = 'in_show'
    modal_main.classList.add('in_show');
    load.classList.add('show_load');
    tweet2.classList.add('in_show');

    setTimeout(() => {
        loading.classList.add('in_show');
        loaded.style.display = 'block';
        twitter_checked();
    }, 3300);
});


//ツイート処理
//ツイート投稿内容に入力されたテキストを取得するとともに、ツイートのチェックボックスがチェックされている場合にはその内容が反映されたtwitter画面へと飛ぶ
function twitter_checked() {
    let twitter_text = document.getElementById("tweet_box").value;//Twitterようコメントの内容
    if (twitter_check_box.checked) window.open("https://twitter.com/intent/tweet?text=" + twitter_text);//チェックされている場合にTwitterに飛ぶ＋内容も反映
};

var ElementsCount1 = document.study_contents.elements.length;//モーダルの1つ目のインプットタグ一覧
var ElementsCount2 = document.study_languages.elements.length;//モーダルの２目のインプットタグ一覧
var texts = document.getElementById('tweet_box');//Twitter用コメント
var study_hour = document.getElementById('study_hour');//学習時間
var checked = document.getElementsByName('checked');

//クローズ（×）ボタンを押した時の処理
closeBtn.addEventListener('click', function () {
    popup.classList.remove('show');
    overlay.classList.remove('overlay');
    load.classList.remove('show_load');
    modal_main.className = 'modal_main';
    tweet1.classList.remove('in_show');
    tweet2.classList.remove('in_show');
    loading.classList.remove('in_show');
    loaded.style.display = 'none';
    //選択したチェックボックス の背景色を元に戻す
    checked.forEach(e => {
        e.style.background ="#f4f5f9" ;     
    });
    
    texts.value = '';       //記入内容をリセット
    study_day.value = '';//記入内容をリセット
    study_hour.value = '';//記入内容をリセット

    for (let i = 0; i < ElementsCount1; i++) {
        document.study_contents.elements[i].checked = false; // チェック内容をリセット
    }
    for (let i = 0; i < ElementsCount2; i++) {
        document.study_languages.elements[i].checked = false; //チェック内容をリセット
    }
});


// グラフ
// ライブラリのロード
// name:visualization(可視化),version:バージョン(1),packages:パッケージ(corechart)
google.load('visualization', '1', { 'packages': ['corechart'] });

// グラフを描画する為のコールバック関数を指定
google.setOnLoadCallback(drawChart);

// グラフの描画   
function drawChart() {
    // 配列からデータの生成
    var data = google.visualization.arrayToDataTable([
        ['day', 'hour', { role: 'style' }],
        [1, 3, 'color: #76A7FA'],
        [2, 4, 'color: #76A7FA'],
        [3, 5, 'color: #76A7FA'],
        [4, 3, 'color: #76A7FA'],
        [5, 2, 'color: #76A7FA'],
        [6, 1, 'color: #76A7FA'],
        [7, 0, 'color: #76A7FA'],
        [8, 2, 'color: #76A7FA'],
        [9, 2, 'color: #76A7FA'],
        [10, 8, 'color: #76A7FA'],
        [11, 3, 'color: #76A7FA'],
        [12, 2, 'color: #76A7FA'],
        [13, 2, 'color: #76A7FA'],
        [14, 1, 'color: #76A7FA'],
        [15, 5, 'color: #76A7FA'],
        [16, 0, 'color: #76A7FA'],
        [17, 0, 'color: #76A7FA'],
        [18, 0, 'color: #76A7FA'],
        [19, 0, 'color: #76A7FA'],
        [20, 0, 'color: #76A7FA'],
        [21, 0, 'color: #76A7FA'],
        [22, 0, 'color: #76A7FA'],
        [23, 0, 'color: #76A7FA'],
        [24, 0, 'color: #76A7FA'],
        [25, 0, 'color: #76A7FA'],
        [26, 0, 'color: #76A7FA'],
        [27, 0, 'color: #76A7FA'],
        [28, 0, 'color: #76A7FA'],
        [29, 0, 'color: #76A7FA'],
        [30, 0, 'color: #76A7FA']
    ]);

    // オプションの設定
    var options = {
        legend: { position: 'none' },
        width: "100%",
        height: '400',
        bar: { groupWidth: "60%" },
        //x軸
        hAxis: {
            gridlines: { color: 'none' },
            ticks: [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30],
            titleTextStyle: { color: '#137DC4' }
        },
        //y軸
        vAxis: {
            title: '', format: "#.#h",
            minValue: 0,
            gridlines: { color: 'none' },
            baselineColor: 'block',
            textPosition: 'out',
            ticks: [2, 4, 6, 8]
        },
    };
    // 指定されたIDの要素に棒グラフを作成
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    // グラフの描画
    chart.draw(data, options);
};

//学習言語円グラフ
google.setOnLoadCallback(drawCircle_language);

function drawCircle_language() {
    var data2 = new google.visualization.arrayToDataTable([
        // ['language', 'hour'],
        // ['javascript', ],
        // ['css', 3],
        // ['php', 5],
        // ['html', 4],
        // ['laravel', 3],
        // ['sql', 8],
        // ['shell', 2],
        // ['情報システム基礎知識', 2]
        ['javascript', {{$js_int}}],
        ['css', {{$css_int}}],
        ['php', {{$php_int}}],
        ['html', {{$html_int}}],
        ['laravel', {{$laravel_int}}],
        ['sql', {{$sql_int}}],
        ['shell', {{$shell_int}}],
        ['情報システム基礎知識', {{$info_base_int}}]
    ]);

    dd({{$css_int}});

    var formatter2 = new google.visualization.NumberFormat({ pattern: '#,###.0' + '時間' });
    formatter2.format(data2, 1);

    var options2 = {
        pieHole: 0.5,
        legend: 'none',
        colors: ['#2A54EF', '#1B71BD', '#21BDDE', '#3DCEFD', '#B39EF3', '#6D47EC', '#4A18EF', '#3107BF'],
        width: '100%',
        height: '254',
        chartArea: { width: '100%', height: '100%', top: 0 },
    };

    var chart_languages = new google.visualization.PieChart(document.getElementById('chart_languages'));
    chart_languages.draw(data2, options2);
};

// 学習コンテンツ円グラフ
google.setOnLoadCallback(drawCircle_content);

function drawCircle_content() {
    var data = new google.visualization.arrayToDataTable([
        ['language', 'hour'],
        ['ドットインストール', 19.9],
        ['N予備校', 11.8],
        ['posse課題', 12],
    ]);

    var formatter = new google.visualization.NumberFormat({ pattern: '#,###.0' + '時間' });
    formatter.format(data, 1);

    var options = {
        pieHole: 0.5,
        legend: 'none',
        colors: ['#2A54EF', '#1B71BD', '#21BDDE'],
        width: '100%',
        height: '254',
        chartArea: { width: '100%', height: '100%', top: 0 },
    };
    var chart_contents = new google.visualization.PieChart(document.getElementById('chart_contents'));
    chart_contents.draw(data, options);
};

// グラフの大きさを動的に変更
window.onresize = function () {
    drawChart();
    drawCircle_language();
    drawCircle_content();
};
	</script>
</body>

</html>