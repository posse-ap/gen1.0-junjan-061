<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>quizy</title>
</head>
<body>
    @foreach ($items as $item)
    {{-- <a href="{{ action('ChoicesController@index', $post->id) }}">{{$item->getData()}}</a><br> --}}
    {{-- <a href="quiz/1">{{$item->getData()}}</a><br> --}}
    {{-- <a href="{{ action('ChoicesController@index', ['$question_id'=>1]) }}">{{$item->getData()}}</a><br> --}}
    <a href="quiz/{id?}">{{$item->getData()}}</a><br>
    @endforeach



    {{-- @foreach ($items as $item)
    <tr>
        {{-- <td>{{$item->getData()}}</td> --}}
        {{-- <td>@if ($item->choice != null)
                {{$item->choice->getData()}}
            @endif
        </td>
    </tr> --}}
    {{-- @endforeach --}}
</body>
</html>