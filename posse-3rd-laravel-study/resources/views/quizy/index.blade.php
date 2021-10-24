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
    <a href="quiz/{{ $item->id }}">{{$item->getData()}}</a><br>
    @endforeach

</body>
</html>