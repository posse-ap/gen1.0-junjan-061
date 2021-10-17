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


    <h2>問題タイトル一覧(クリックして編集してね💛)</h2>


    @foreach ($questions as $question)
    <a href="admin/{{ $question['id'] }}/edit">{{$question->getData()}}</a><br>
    @endforeach

    <p> 問題タイトル追加 </p>
    <table>
        <form action="/admin" method="post">
        @csrf
            <tr><th>問題タイトル: </th><td><input type="text" name="name"
            value="{{old('name')}}"></td></tr>
            {{-- <tr><th>url: </th><td><input type="text" name="url"
            value="{{old('')}}"></td></tr> --}}
            <tr><th></th><td><input type="submit" value="send"></td></tr>
    </form>
    {{-- <a href="admin/edit/" >問題タイトル編集</a> --}}
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