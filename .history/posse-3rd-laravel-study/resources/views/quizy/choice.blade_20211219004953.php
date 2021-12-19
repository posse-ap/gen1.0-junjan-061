<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($questions as $question)
    @foreach ($question->themes as $theme)
    @foreach ($theme->choices as $choice)

    <input type="text">{{$choice->name}}
    <form action="{{ route('admin.update_question', $questions->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        {{-- <input type="hidden" name="id" value="{{$}}"> --}}
        選択肢:<input type="text" name="name" value="">
        {{-- name:<input type="text" name="name" value="{{optional($questions->question)->name}}"> --}}
            <input type="submit" value="send">
    </form>

    @endforeach
    @endforeach
    @endforeach
</body>
</html>