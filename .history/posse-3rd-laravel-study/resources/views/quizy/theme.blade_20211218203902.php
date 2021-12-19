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
    @foreach ($questions as $question)
    @foreach ($question->themes as $theme)

    <p>{{$theme['id']}}.この地名は何て読む？</p>
    {{-- <a href="{{ route( 'admin.delete', [ 'theme_id'=>$theme->id ] ) }}">削除</a> --}}
    {{-- <a href="{{ route( 'admin.edit', ['question_id'=>$question->id, 'theme_id'=>$theme->id ] ) }}">編集</a> --}}
    {{-- <a href="{{ route( 'admin.edit', $theme->id ) }}">編集</a> --}}
    {{-- @foreach ($choices->where('theme_id', $theme->id) as $choice)
        <p>{{ $loop->index + 1 }}{{$choice['name']}}</p>
    @endforeach --}}

    <img src="/img/{{ $theme->image }}">
    <form action="{{ route('admin.update_question', $theme->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        {{-- <input type="hidden" name="id" value="{{$}}"> --}}
        <input type="file" name="image" value="ガチで東京の人しか解けない！更新">
        {{-- name:<input type="text" name="name" value="{{optional($questions->question)->name}}"> --}}
            <input type="submit" value="send">
    </form>
    <a href="{{ route( 'admin.choice', [ 'question_id'=>$question['id'] ] ) }}">選択肢の編集</a>
    @endforeach
    @endforeach
    <h2>問題追加</h2>
    <table>
        <form action="/admin" method="post">
            @csrf
            <tr><th>設問追加</th><td><input type="text" name="name"
            value=""></td></tr>
            <tr><th></th><td><input type="submit" value="send"></td></tr>
        </form>
    </table>

    
</body>
</html>