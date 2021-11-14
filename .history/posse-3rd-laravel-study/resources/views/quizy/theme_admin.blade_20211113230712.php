<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>編集</h2>
    @foreach ($themes as $theme)

    <p>{{$theme['name']}}</p>
    <a href="{{ route( 'admin.delete', [ 'theme_id'=>$theme['id'] ] ) }}">削除</a>
    <a href="{{ route( 'admin.edit', ['question_id'=>, 'theme_id'=>$theme['id'] ] ) }}">編集</a>
    {{-- <a href="{{ route( 'admin.edit', $theme->id ) }}">編集</a> --}}
    @foreach ($choices->where('theme_id', $theme->id) as $choice)
        <p>{{ $loop->index + 1 }}{{$choice['name']}}</p>
    @endforeach

    <img src="/img/{{ $theme->image }}">

    @endforeach

    <h2>問題追加</h2>
    <table>
        <form action="/admin" method="post">
            @csrf
            <tr><th>問題追加 </th><td><input type="text" name="name"
            value="{{old('name')}}"></td></tr>
            <tr><th></th><td><input type="submit" value="send"></td></tr>
        </form>
    </table>

    
</body>
</html>