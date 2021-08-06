<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link
        href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
        <link href="/css/quizy.css" rel="stylesheet">
</head>

<body>
    <div class="main">
        <!-- ここから1問目 -->
        @section('quiz')
            <div class="quiz">
                <h1>この地名はなんて読む？</h1>
                <img src="">
                <ul>
                    <li id="answerlist_1_1" name="answerlist_1" class="answerlist" onclick="check(1, 1, 2)">こうわ</li>
                    <li id="answerlist_1_2" name="answerlist_1" class="answerlist" onclick="check(1, 2, 2)">たかなわ</li>
                    <li id="answerlist_1_3" name="answerlist_1" class="answerlist" onclick="check(1, 3, 2)">たかわ</li>
                    <li id="answerbox_1" class="answerbox">
                        <span id="answertext_1"></span><br>
                        <span>正解は「たかなわ」です！</span>
                    </li>
                </ul>
            </div>
        @endsection
        <!-- ここから2問目 -->
        
        <div class="quiz">
            <h1>2. この地名はなんて読む？</h1>
            <img src="">
            <ul>
                <li id="answerlist_2_1" name="answerlist_2" class="answerlist" onclick="check(2, 1, 3)">かめど</li>
                <li id="answerlist_2_2" name="answerlist_2" class="answerlist" onclick="check(2, 2, 3)">かめと</li>
                <li id="answerlist_2_3" name="answerlist_2" class="answerlist" onclick="check(2, 3, 3)">かめいど</li>
                <li id="answerbox_2" class="answerbox">
                    <span id="answertext_2"></span><br>
                    <span>正解は「かめいど」です！</span>
                </li>
            </ul>
        </div>

        <!-- ここから3問目 -->
        <div class="quiz">
            <h1>3. この地名はなんて読む？</h1>
            <img src="">
            <ul>
                <li id="answerlist_3_1" name="answerlist_3" class="answerlist" onclick="check(3, 1, 1)">こうじまち</li>
                <li id="answerlist_3_2" name="answerlist_3" class="answerlist" onclick="check(3, 2, 1)">おかとまち</li>
                <li id="answerlist_3_3" name="answerlist_3" class="answerlist" onclick="check(3, 3, 1)">かゆまち</li>
                <li id="answerbox_3" class="answerbox">
                    <span id="answertext_3"></span><br>
                    <span>正解は「こうじまち」です！</span>
                </li>
            </ul>
        </div>

        <!-- ここから4問目 -->
        <div class="quiz">
            <h1>4. この地名はなんて読む？</h1>
            <img src="">
            <ul>
                <li id="answerlist_4_1" name="answerlist_4" class="answerlist" onclick="check(4, 1, 1)">おなりもん</li>
                <li id="answerlist_4_2" name="answerlist_4" class="answerlist" onclick="check(4, 2, 1)">おせいもん</li>
                <li id="answerlist_4_3" name="answerlist_4" class="answerlist" onclick="check(4, 3, 1)">おなりかど</li>
                <li id="answerbox_4" class="answerbox">
                    <span id="answertext_4"></span><br>
                    <span>正解は「おなりもん」です！</span>
                </li>
            </ul>
        </div>

        <script src="/js/quizy.js"></script>
    </div>
</body>

</html>