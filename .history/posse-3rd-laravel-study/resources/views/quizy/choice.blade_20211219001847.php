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
    @foreach ($theme->choices as $theme)

    @endforeach
    @endforeach
    @endforeach
</body>
</html>