<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>データ更新</h1>
    {{-- <form action="/admin/{{$question->id}}" method="POST"> --}}
    <form action="/admin/{{$question->id}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$question->id}}">
            {{-- <input type="hidden" name="_method" value="put"> --}}
            name:<input type="text" name="name" 
                value="ガチで東京の人しか解けない！更新してやったわ">
                <input type="submit" value="send">
        </form>

        <h1>データ削除</h1>
        <form action="/admin/{{$question->id}}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{$question->id}}">
            {{-- <input type="hidden" name="_method" value="put"> --}}
                <input type="submit" value="send">
        </form>

        {{-- <p>{{ $choices['name'] }}</p> --}}
        @foreach ($choices['choices'] as $choice)
        <p>{{$choice['name']}}</p>
        @endforeach

</body>
</html>