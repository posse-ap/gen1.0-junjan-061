<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('assets/css/styles2.css') }}" rel="stylesheet">
    <title>POSSE</title>
</head>

<body>
    <header class="header">
        <div class="d-lg-flex header-container mx-auto">
            <div class="d-flex">
                <h1>
                    <img src="./img/header-logo.png" class="header-img pr-3" alt="POSSE">
                </h1>
                <p class="header-text my-auto">4th week</p>
            </div>
            <button class="post-btn mr-0 ml-auto my-auto d-none d-lg-block" data-toggle="modal"
                data-target="#modalPost">記録・投稿</button>
            <a href="{{ route('admin') }}" class="post-btn mr-0 my-auto d-none d-lg-block">ユーザ―管理</a>
            {{-- <button class="post-btn mr-0 ml-auto my-auto d-none d-lg-block" data-toggle="modal" data-target="#modalPost">アカウント管理</button> --}}
        </div>
    </header>

    <main>
        <div class="main-container mx-auto">
            <div class="cards d-lg-flex justify-content-between">

                <div class="time-section">
                    <dl class="time-cards d-flex justify-content-between">
                        <div class="card text-center py-2 py-lg-3">
                            <dt class="time-cards-title mb-0">Today</dt>
                            <span class="font-weight-bold h2 lg-h1 my-1 my-lg-2">{{ $day_total }}</span>
                            <span class="text-muted hour">hour</span>
                        </div>
                        <div class="card text-center py-2 py-lg-3">
                            <dt class="time-cards-title mb-0">Month</dt>
                            <span class="font-weight-bold h2 lg-h1 my-1 my-lg-2">{{ $month_total }}</span>
                            <span class="text-muted hour">hour</span>
                        </div>
                        <div class="card text-center py-2 py-lg-3">
                            <dt class="time-cards-title mb-0">Total</dt>
                            <span class="font-weight-bold h2 lg-h1 my-1 my-lg-2">{{ $total }}</span>
                            <span class="text-muted hour">hour</span>
                        </div>
                    </dl>

                    <hr class="d-lg-none">

                    <section class="card time-graph-card">
                        <div id="pc_columnchart_values" class="d-none d-lg-block"></div>
                        <div id="sp_columnchart_values" class="d-block d-lg-none"></div>
                    </section>
                </div>

                <div class="study-content-section d-flex justify-content-between">
                    <section class="card language-card">
                        <div class="language-card-container py-4">
                            <h2 class="font-weight-bold lg-h5 mb-0">学習言語</h2>
                            <div id="language_piechart"></div>
                            <div class="item-list">

                                @foreach ($languages as $language)
                                    <span class="item"
                                        style="color: {{ $language->color }}">{{ $language->language }}</span>
                                @endforeach

                            </div>
                        </div>
                    </section>
                    <section class="card contents-card">
                        <div class="contents-card-container py-4">
                            <h2 class="font-weight-bold lg-h5 mb-0">学習コンテンツ</h2>
                            <div id="contents_piechart"></div>
                            <div class="item-list">
                                @foreach ($contents as $content)
                                    <span class="item" style="">{{ $content->contents }}</span>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

    <footer class="mt-3 mt-lg-4 main-container mx-auto">
        <p class="text-center font-weight-bold"><span class="pr-3" id="prev">&lt;</span><span
                id="thisMonth"></span><span class="pl-3" id="next">&gt;</span></p>

        <button class="post-btn mx-auto d-block d-lg-none" data-toggle="modal" data-target="#modalPost">記録・投稿</button>
    </footer>

    <!-- modal main -->
    <div class="modal fade" id="modalPost" tab-index="-1" aria-hidden="true">
        <input type="checkbox" id="checkbox1" value="1" name='languages[]'>
        <input type="checkbox" id="checkbox2" value="2" name='languages[]'>
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-container">
                    {{-- <form action="{{ route('add') }}" method="POST"> --}}
                        @csrf
                        <div class="form-group d-lg-flex justify-content-between">
                            <div class="modal-left-parts">
                                <section class="modal-date-part">
                                    <p class="font-weight-bold modal-title">学習日</p>
                                    {{-- <input type="date" id="studyDate" data-toggle="modal" name="date" data-target="#modalCalendar"> --}}
                                    <input type="date" id="studyDate" data-toggle="modal" name="date">
                                </section>
                                <section class="modal-contents-pc-part d-none d-lg-block pt-3">
                                    <p class="font-weight-bold modal-title">学習コンテンツ (複数選択可)</p>
                                    @foreach ($contents as $content)
                                        <input id="contents{{ $content->id }}" type="checkbox" name="content_id[]"
                                            value="{{ $content->id }}">
                                        <label for="contents{{ $content->id }}">{{ $content->contents }}</label>
                                    @endforeach
                                </section>

                                <section class="modal-contents-sp-part d-block d-lg-none pt-3">
                                    <p class="font-weight-bold modal-title">学習コンテンツ (複数選択可)</p>
                                    <div class="modal-contents-select-box" id="modal-contents-select-box">
                                        <select>
                                            <option>N予備校</option>
                                        </select>
                                        <div class="modal-contents-over-select"></div>
                                    </div>
                                    <div id="modal-contents-check-box">
                                        <input type="checkbox" id="contents4" name="content_id" value="1">
                                        <label for="contents4">N予備校</label>

                                        <input type="checkbox" id="contents5" name="content_id" value="2">
                                        <label for="contents5">ドットインストール</label>

                                        <input type="checkbox" id="contents6" name="content_id" value="3">
                                        <label for="contents6">POSSE課題</label>
                                    </div>
                                </section>

                                <section class="modal-language-pc-part d-none d-lg-block pt-3">
                                    <p class="font-weight-bold modal-title">学習言語 (複数選択可)</p>
                                

                                </section>

                                <div class="modal-language-sp-part d-block d-lg-none pt-3">
                                    <p class="font-weight-bold modal-title">学習言語 (複数選択可)</p>
                                    <div class="modal-language-select-box" id="modal-language-select-box">
                                        <select>
                                            <option>HTML</option>
                                        </select>
                                        <div class="modal-language-over-select"></div>
                                    </div>
                                    <div id="modal-language-check-box">
                                        <input id="language9" type="checkbox" name="language_id[]" value="4">
                                        <label for="language9">HTML</label>

                                        <input id="language10" type="checkbox" name="language_id[]" value="2">
                                        <label for="language10">CSS</label>

                                        <input id="language11" type="checkbox" name="language_id[]" value="1">
                                        <label for="language11">JavaScript</label>

                                        <input id="language12" type="checkbox" name="language_id[]" value="3">
                                        <label for="language12">PHP</label>

                                        <input id="language13" type="checkbox" name="language_id[]" value="5">
                                        <label for="language13">Laravel</label>

                                        <input id="language14" type="checkbox" name="language_id[]" value="6">
                                        <label for="language14">SQL</label>

                                        <input id="language15" type="checkbox" name="language_id[]" value="7">
                                        <label for="language15">SHELL</label>

                                        <input id="language16" type="checkbox" name="language_id[]" value="8">
                                        <label for="language16">情報システム基礎知識(その他)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-right-parts pt-3 pt-lg-0">
                                <section class="modal-time-part">
                                    <p class="font-weight-bold modal-title">学習時間</p>
                                    <input type="text" name="hour">
                                </section>
                                <section class="modal-twitter-part pt-3">
                                    <p class="font-weight-bold modal-title">Twitter用コメント</p>
                                    <textarea id="postTwitter" cols="0" rows="9"></textarea>
                                </section>
                                <div class="modal-twitter-auto-part pt-1">
                                    <input id="twitter" type="checkbox" checked><label
                                        for="twitter">Twitterに自動投稿する</label>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="post-btn d-block mx-auto mt-3 mb-4" id="to-modalLoading">記録・投稿</button>
                        {{-- <button type="button" class="post-btn d-block mx-auto mt-3 mb-4" id="to-modalLoading">記録・投稿</button> --}}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- modal main -->

    <!-- modal calendar -->
    <div class="modal fade" id="modalCalendar" tab-index="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&larr;</span>
                </button>
                <div class="modal-container">
                    <div class="modal-calendar">
                        <table>
                            <thead>
                                <tr>
                                    <th id="calendarPrev" colspan="2">&lt;</th>
                                    <th id="calendarThisMonth" colspan="3"></th>
                                    <th id="calendarNext" colspan="2">&gt;</th>
                                </tr>
                                <tr class="calendar-day">
                                    <th>Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                </tr>
                            </thead>

                            <tbody class="calendar">
                            </tbody>
                        </table>
                        <button type="button" class="post-btn d-block mx-auto mt-4" id="decideCalendar">決定</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal calendar -->

    <!-- modal loading -->
    <div class="modal fade" id="modalLoading" tab-index="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-container">
                    <div class="loader-wrap">
                        <div class="loader">Loading...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal loading -->

    <!-- modal success -->
    <div class="modal fade" id="modalSuccess" tab-index="-1" aria-hidden="true">
        <div class="modal-dialog modal-success-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-container text-center">
                    <p class="modal-success-color">AWESOME!</p>
                    <span class="modal-success-color modal-check-mark"></span>
                    <p>記録・投稿<br>完了しました</p>
                </div>
            </div>
        </div>
    </div>
    <!-- modal success -->

    <!-- modal error -->
    <div class="modal fade" id="modalError" tab-index="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-container text-center">
                    <p class="error-color">ERROR!</p>
                    <span class="error-color modal-error-mark"></span>
                    <p class="error-text">一時的にご利用できない状態です。<br>しばらく経ってから<br>再度アクセスしてください</p>
                </div>
            </div>
        </div>
    </div>
    <!-- modal error -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="./js/calendar/index.js"></script>
    <script type="text/javascript" src="./js/chart/index.js"></script>
    <script type="text/javascript" src="./js/displayThisMonth/index.js"></script>
    <script type="text/javascript" src="./js/modal/index.js"></script>
    <script type="text/javascript" src="./js/utils/index.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>

<script>
    'use strict'

    // よく使うカラーを定義しておく
    const WHITE = "#fff"
    const CHART_COLOR_BLUE_1 = "#0f71bc"
    const CHART_COLOR_BLUE_2 = "#3ccfff"

    const createStudyTimeChart = () => {
        // 学習時間
        // 2次元配列をDataTableに変更する
        // 参考: https://developers.google.com/chart/interactive/docs/reference#arraytodatatable
        const data = google.visualization.arrayToDataTable([
            // roleについて https://developers.google.com/chart/interactive/docs/roles
            ["Date", "Hour", {
                role: "style"
            }],
            ["", 2, CHART_COLOR_BLUE_1],
            ["2", 8, CHART_COLOR_BLUE_2],
            ["", 1, CHART_COLOR_BLUE_1],
            ["4", 2, CHART_COLOR_BLUE_2],
            ["", 3, CHART_COLOR_BLUE_1],
            ["6", 4, CHART_COLOR_BLUE_2],
            ["", 5, CHART_COLOR_BLUE_1],
            ["8", 6, CHART_COLOR_BLUE_2],
            ["", 7, CHART_COLOR_BLUE_1],
            ["10", 1, CHART_COLOR_BLUE_2],
            ["", 2, CHART_COLOR_BLUE_1],
            ["12", 3, CHART_COLOR_BLUE_2],
            ["", 4, CHART_COLOR_BLUE_1],
            ["14", 7, CHART_COLOR_BLUE_2],
            ["", 2, CHART_COLOR_BLUE_1],
            ["16", 7, CHART_COLOR_BLUE_2],
            ["", 4, CHART_COLOR_BLUE_1],
            ["18", 3, CHART_COLOR_BLUE_2],
            ["", 3.2, CHART_COLOR_BLUE_1],
            ["20", 3.5, CHART_COLOR_BLUE_2],
            ["", 3.2, CHART_COLOR_BLUE_1],
            ["22", 3.5, CHART_COLOR_BLUE_2],
            ["", 3.2, CHART_COLOR_BLUE_1],
            ["24", 3.5, CHART_COLOR_BLUE_2],
            ["", 3.2, CHART_COLOR_BLUE_1],
            ["26", 3.5, CHART_COLOR_BLUE_2],
            ["", 3.2, CHART_COLOR_BLUE_1],
            ["28", 6.5, CHART_COLOR_BLUE_2],
            ["", 8, CHART_COLOR_BLUE_1],
            ["30", 2, CHART_COLOR_BLUE_2],
        ]);
        // DataViewを作成する
        const view = new google.visualization.DataView(data);

        const pc_options = {
            height: '400', // 高さを指定
            bar: {
                groupWidth: "50%"
            }, // バーの太さ
            legend: {
                position: "none"
            }, // legendを非表示
            vAxis: {
                format: '0h', // 縦軸のメモリ基準
                gridlines: {
                    color: WHITE // 罫線の色
                }
            }
        };
        // DOMで表示場所を指定
        const pcChart = new google.visualization.ColumnChart(document.getElementById("pc_columnchart_values"));
        // チャートを描写
        pcChart.draw(view, pc_options);

        const sp_options = {
            height: '200', // 高さを指定
            bar: {
                groupWidth: "50%"
            }, // バーの太さ
            legend: {
                position: "none"
            }, // legendを非表示
            vAxis: {
                format: '0h', // 縦軸のメモリ基準
                gridlines: {
                    color: WHITE // 罫線の色
                }
            }
        };
        // DOMで表示場所を指定
        const spChart = new google.visualization.ColumnChart(document.getElementById("sp_columnchart_values"));
        // チャートを描写
        spChart.draw(view, sp_options);
    }

    const createLanguagesChart = () => {
        // 学習言語
        // 2次元配列をDataTableに変更する
        let data = google.visualization.arrayToDataTable([
            {!! $language_chart !!}
        ]);

        const options = {
            legend: {
                position: "none", // legendを非表示
            },
            // 中心の空白部分 0~1で指定
            pieHole: 0.5,
            // チャートの部分ごとにカラーを指定
            slices: {
                {!! $language_chart_color !!}
            },
            // チャートサイズ
            chartArea: {
                width: '100%',
                height: '100%'
            }
        };

        // DOMで表示場所を指定
        const chart = new google.visualization.PieChart(document.getElementById('language_piechart'));
        // チャートを描写
        chart.draw(data, options);
    }

    const createContentsChart = () => {
        // 学習コンテンツ
        let data = google.visualization.arrayToDataTable([
            {!! $content_chart !!}
        ]);

        const options = {
            legend: {
                position: "none",
            },
            // 中心の空白部分 0~1で指定
            pieHole: 0.5,
            // チャートの部分ごとにカラーを指定
            slices: {
                {!! $content_chart_color !!}
            },
            // チャートサイズ
            chartArea: {
                width: '100%',
                height: '100%',
            }
        };

        // DOMで表示場所を指定
        const chart = new google.visualization.PieChart(document.getElementById('contents_piechart'));
        // チャートを描写
        chart.draw(data, options);
    }

    const drawChart = () => {
        // 学習時間を表示
        createStudyTimeChart()

        // 学習言語を表示
        createLanguagesChart()

        // 学習コンテンツを表示
        createContentsChart()
    }

    // パッケージのロード
    // current: Google chart の latest versionを表す
    // corechart: chart種類(bar, column, line, area, stepped area, bubble, pie, donut, combo, candlestick, histogram, scatter)
    // 参照: https://developers.google.com/chart/interactive/docs/basic_load_libs
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // resize時に、チャートを作り直し、windowサイズに合わせたチャートをレンダリングする
    // drawChartが発火しすぎないようにthrottoleで0.25秒間の猶予を設けてる
    window.addEventListener('resize', $.throttle(250, drawChart))

    // 当日の年月日を取得する
    const calendarToday = new Date();
    let calendarYear = calendarToday.getFullYear();
    // getMonthは0から始まる ex: 1月の場合は0、12月の場合は11
    let calendarMonth = calendarToday.getMonth();
    let calendarDate = calendarToday.getDate();

    // 年月日を表示するための文言を作成する
    function studyDateText(date = String(calendarDate).padStart(2, '0'), year = calendarYear, month = calendarMonth) {
        return `${year}年${String(month + 1).padStart(2, '0')}月${date}日`;
    }

    document.getElementById('studyDate').value = studyDateText()

    // 先月の日付のうち、今月カレンダーに含まれる(表示はしない)日付配列を取得する
    function getPrevMonth() {
        const dates = [];
        // 先月の末日を取得する
        const prevLastDate = new Date(calendarYear, calendarMonth, 0).getDate();
        // 今月の初日の曜日を取得する
        const prevDays = new Date(calendarYear, calendarMonth, 1).getDay();
        // 日曜から今月初日の曜日までの日数でループを回す
        for (let i = 0; i < prevDays; i++) {
            // 配列の先頭に順に日付を入れていく
            // ex: [31, 30, 29. 28]
            dates.unshift({
                date: prevLastDate - i,
                selectedDate: false,
                disabled: true,
                pastDays: true,
            });
        }
        return dates
    }

    function getThisMonth() {
        const dates = [];

        // 今月の末日を取得する
        const lastDateInThisMonth = new Date(calendarYear, calendarMonth + 1, 0).getDate();

        // 今月1日から今月末日までの日数でループを回す
        for (let i = 1; i <= lastDateInThisMonth; i++) {
            // 配列の末尾に順に日付を入れていく
            // ex: [1, 2, 3 ~ 30]
            dates.push({
                date: i,
                // 日付が当日の場合、selectedDateをtrueにする
                selectedDate: new Date(calendarYear, calendarMonth, i) === calendarToday,
                disabled: false,
                // 日付が過去日の場合、pastDaysをtrueにする
                pastDays: new Date(calendarYear, calendarMonth, i) < calendarToday,
            });
        }

        return dates;
    }

    // 来月の日付のうち、今月カレンダーに含まれる(表示はしない)日付配列を取得する
    function getNextMonth() {
        const dates = [];
        // 今月の末日の曜日を取得する
        const lastDayInThisMonth = new Date(calendarYear, calendarMonth + 1, 0).getDay();
        // 今月末日から最終週の土曜までの日数でループを回す
        for (let i = 0; i < 6 - lastDayInThisMonth; i++) {
            // 配列の末尾に順に日付を入れていく
            // ex: [1, 2, 3]
            dates.push({
                date: i + 1,
                selectedDate: false,
                disabled: true,
                pastDays: true,
            });
        }

        return dates;
    }

    function createCalendar() {
        // calendarというclassをもつtbodyを取得する
        const tbody = document.querySelector('tbody.calendar');
        // 念の為tbodyが中身(カレンダー)を持っていたら消して初期化する
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }

        // カレンダーのタイトルを作成し、calendarThisMonthというidをもつDOMに表示する ex: 2021年03月
        const calendarThisMonth = `${calendarYear}年${String(calendarMonth + 1).padStart(2, '0')}月`;
        document.getElementById('calendarThisMonth').textContent = calendarThisMonth;

        // 先月、当月、来月の日付を一つの配列にまとめる
        const dates = [
            ...getPrevMonth(),
            ...getThisMonth(),
            ...getNextMonth(),
        ];
        // 日数を7で割って何週あるかを算出する
        const weeks = [];
        const weeksCount = dates.length / 7;

        // 週の数だけループを回す
        for (let i = 0; i < weeksCount; i++) {
            // 7日ごとに配列にし、weeks配列に突っ込む
            weeks.push(dates.splice(0, 7));
        }
        // weeksの要素分だけループする
        weeks.forEach(week => {
            // weekは日付をまとめた配列
            // trを作成(週を表現する)
            const tr = document.createElement('tr');
            // weekの日付分だけループさせる
            week.forEach(date => {
                // tdを作成(日にちを表現する)
                const td = document.createElement('td');

                // tdに日付を設定する
                td.textContent = date.date;

                // その日がselectedDateがtrueならselected-dateというclassを加える
                if (date.selectedDate) {
                    td.classList.add('selected-date');
                }
                // その日がdisabledがtrueならdisabledというclassを加える
                if (date.disabled) {
                    td.classList.add('disabled');
                }
                // その日がpastDaysがtrueならpast-daysというclassを加える
                if (date.pastDays) {
                    td.classList.add('past-days');
                }

                // trの配下にtdをくっつける
                tr.appendChild(td);
            });
            // 取得していたtbodyの配下にtrをくっつける
            tbody.appendChild(tr);
        });

        addSetToday()
    }

    function addSetToday() {
        // 昨日以前とdisabled(前月と来月の日にち)以外の日にちDOMを取得する
        const validaDates = document.querySelectorAll('tbody.calendar td:not(.disabled):not(.past-days)')
        // 取得した日にちでループを回す
        validaDates.forEach(td => {
            // tdには日にちのDOM1つが入り、それがclickされた時の挙動を設定する
            td.addEventListener('click', (e) => {
                // 学習日を更新する
                document.getElementById('studyDate').value = studyDateText(e.target.textContent)
                // selected-dateというclassをもつtdを取得する
                const selectedDate = document.querySelector('td.selected-date')
                // selected-dateというclassをもつtdがあれば、そのdomからselected-dateを取り除く
                if (selectedDate) {
                    selectedDate.classList.remove('selected-date')
                }
                // clickされたtdにselected-dateというclassを追加する
                td.classList.add('selected-date')
            })
        })
    }

    // calendarPrevというidをもつDOMにclickイベントをバインドする
    document.getElementById('calendarPrev').addEventListener('click', () => {
        // 月を一つ前にする
        calendarMonth--;
        // 当月が1月の時、年を1つ前にし、月を12月にする
        if (calendarMonth < 0) {
            calendarYear--;
            calendarMonth = 11;
        }

        createCalendar();
    });

    // calendarNextというidをもつDOMにclickイベントをバインドする
    document.getElementById('calendarNext').addEventListener('click', () => {
        // 月を一つ後にする
        calendarMonth++;
        // 当月が12月の時、年を1つ後にし、月を1月にする
        if (calendarMonth > 11) {
            calendarYear++;
            calendarMonth = 0;
        }
        createCalendar();
    });

    createCalendar();


    // Dateオブジェクトを用意し、年月を取得する
    const today = new Date();
    let year = today.getFullYear();
    let month = today.getMonth();

    // 年月をDOMに埋め込む
    function displayThisMonth() {
        // 年月を表示するための文言を組み立てる
        const thisMonth = `${year}年 ${String(month + 1).padStart(2, '0')}月`;
        // 組み立てた文言をthisMonthというidをもつDOMに埋め込む
        document.getElementById('thisMonth').textContent = thisMonth;
    }

    displayThisMonth();

    // prevというidをもつDOMにclickイベントをバインドする
    document.getElementById('prev').addEventListener('click', () => {
        // clickされたら月を一つ前にする
        month--;
        // 1月の時にクリックされたら昨年の12月にする
        if (month < 0) {
            year--;
            month = 11;
        }
        // DOMに表示する年月の文言を更新する
        displayThisMonth();
    });

    // nextというidをもつDOMにclickイベントをバインドする
    document.getElementById('next').addEventListener('click', () => {
        // clickされたら月を一つ後にする
        month++;
        // 12月の時にクリックされたら翌年の1月にする
        if (month > 11) {
            year++;
            month = 0;
        }
        // DOMに表示する年月の文言を更新する
        displayThisMonth();
    });

    // to-fLoadingと言うidをもつDOMを取得する
    // const toModalLoading = document.getElementById('to-modalLoading');

    // toModalLoadingがclickイベントを拾えるようにする
    // toModalLoading.addEventListener('click', () => {
    //     // 投稿モーダルを非表示にし、ローディングモーダルを表示する
    //     // これも関数に切り出しても良いかもね
    //     $('#modalPost').modal('hide');
    //     $('#modalLoading').modal('show');

    //     // 2秒後にtoModalSuccessを呼び出す
    //     setTimeout(function() {
    //         toModalSuccess();
    //     }, 2000)
    // })

    // ローディングモーダルを非表示、successモーダルを表示
    function toModalSuccess() {
        $('#modalLoading').modal('hide');
        $('#modalSuccess').modal('show');
    }

    // SP版の学習内容選択ゾーンに関する処理
    let contentsExpanded = false;
    // セレクトボックスのDOMを取得する
    const contentsSelectBox = document.getElementById('modal-contents-select-box');
    // チェックボックス欄のDOMを取得する
    const contentsCheckbox = document.getElementById('modal-contents-check-box');
    // セレクトボックスがclickイベントを拾えるようにする
    contentsSelectBox.addEventListener('click', () => {
        // 選択肢が開いていたら、チェックボックス欄を非表示にする
        // 選択肢が閉じていたら、チェックボックス欄を表示にする
        contentsCheckbox.style.display = contentsExpanded ? "none" : "block"
        contentsExpanded = !contentsExpanded
    });

    // SP版の言語選択ゾーンに関する処理
    let languageExpanded = false;
    // セレクトボックスのDOMを取得する
    const languageSelectBox = document.getElementById('modal-language-select-box');
    // チェックボックス欄のDOMを取得する
    const languageCheckbox = document.getElementById('modal-language-check-box');
    // セレクトボックスがclickイベントを拾えるようにする
    languageSelectBox.addEventListener('click', () => {
        // 選択肢が開いていたら、チェックボックス欄を非表示にする
        // 選択肢が閉じていたら、チェックボックス欄を表示にする
        languageCheckbox.style.display = languageExpanded ? "none" : "block"
        languageExpanded = !languageExpanded
    });

    // decideCalendarというidをもつDOMを取得し、clickイベントを監視する
    document.getElementById('decideCalendar').addEventListener('click', () => {
        // カレンダーモーダルを閉じる
        $('#modalCalendar').modal('hide');
    })

    /**
     * 親要素より大きい要素は、white-spaceをnormalにする
     * @param {string} targetQuery white-spaceを調整したいdomのquery
     * @param {string} targetParentQuery 調整したいdomの親要素のquery
     * @returns {void}
     */
    function changeWhiteSpace(targetQuery, targetParentQuery) {
        // targetQueryに関するdom(複数)を取得
        const targetDoms = document.querySelectorAll(targetQuery)
        // targetParentQueryに関するdom(単数)を取得し、そのdomの横幅(paddingとborderは含むが、marginは含まない)
        const parentDomWidth = document.querySelector(targetParentQuery).offsetWidth
        // 各項目横の青ポチの幅 + margin-right
        const listDecorationWidth = 20
        // 各項目のpadding-right
        const paddingRight = 10
        targetDoms.forEach((targetDom) => {
            // 親要素の幅 - 確認したいDOMの幅 + リストの丸ぽちの幅 + リストアイテムのpadding
            // -> 子要素が親要素に収まる場合は何もしない
            if (parentDomWidth - targetDom.offsetWidth + listDecorationWidth + paddingRight > 0) return
            // 子要素が親要素に収まらない場合は、子要素を折り返すようにする
            targetDom.style.whiteSpace = 'normal'
        })
    }

    // ブラウザサイズが変更されると、0.25秒の猶予を持って処理を走らせる
    window.addEventListener('resize', $.throttle(250, function() {
        changeWhiteSpace('.item', '.item-list')
    }))
</script>
