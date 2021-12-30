<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>管理画面</h1>

    <h2>問題タイトル一覧💛</h2>
    @foreach ($questions as $question)
    <p>{{$question->id}}{{$question->name}}</p>
    <a href="{{ route( 'admin.question', [ 'question_id'=>$question['id'] ] ) }}">問題タイトルの編集</a>
    <a href="{{ route( 'admin.theme', [ 'question_id'=>$question['id'] ] ) }}">設問の編集</a>
    @endforeach


    <p> 問題タイトル追加❤</p>
    <table>
        <form action= "{{ route('admin.store_question')}}" method="post">
        @csrf
            <tr><th>問題タイトル: </th><td><input type="text" name="name"
            value=""></td></tr>
            <tr><th></th><td><input type="submit" value="タイトル追加"></td></tr>
    </form>
    </table>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</body>
</html>