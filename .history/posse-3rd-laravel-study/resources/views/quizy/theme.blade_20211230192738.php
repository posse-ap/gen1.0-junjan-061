<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>設問の編集画面</h2>
    @foreach ($themes as $theme)


    <p>{{$theme['id']}}.この地名は何て読む？</p>
    <img src="/img/{{ $theme->image }}">
    <form action="{{ route('admin.update_theme', $theme->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="file" name="image">
            <input type="submit" value="画像更新！">
    </form>
    <a href="{{ route( 'admin.choice', [ 'theme_id'=>$theme['id'] ] ) }}">選択肢の編集</a>

    <form action="{{ route('admin.destroy_theme', )}}" method="post">
        @csrf
        <tr><th></th><td><input type="submit" value="設問削除"></td></tr>
    </form>

    @endforeach
    <h2>問題追加</h2>
    <table>
        <form action="{{ route('admin.store_theme')}}" method="post">
            @csrf
            <tr><th>設問追加</th><td><input type="file" name="name"
            value=""></td></tr>
            <tr><th></th><td><input type="submit" value="send"></td></tr>
        </form>
    </table>
    
    {{-- <a href="{{ route( 'admin.delete', [ 'theme_id'=>$theme->id ] ) }}">削除</a> --}}
    {{-- <a href="{{ route( 'admin.edit', ['question_id'=>$question->id, 'theme_id'=>$theme->id ] ) }}">編集</a> --}}
    {{-- <a href="{{ route( 'admin.edit', $theme->id ) }}">編集</a> --}}
    {{-- @foreach ($choices->where('theme_id', $theme->id) as $choice)
        <p>{{ $loop->index + 1 }}{{$choice['name']}}</p>
    @endforeach --}}
    {{-- name:<input type="text" name="name" value="{{optional($questions->question)->name}}"> --}}
</body>
</html>