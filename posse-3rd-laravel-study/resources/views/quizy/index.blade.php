<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>quizy</title>
</head>

<body>

    @foreach ($questions as $question)
    <a href="quiz/{{ $question->id }}">{{$question->getData()}}</a><br>
    @endforeach

</body>
</html>