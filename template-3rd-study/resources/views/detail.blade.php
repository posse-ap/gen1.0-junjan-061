<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>詳細ページ</title>
</head>

<body>
    <h1>{{ $detail->id }}</h1>
    <h1>{{ $detail->title }}</h1>
    <h1>{{ $detail->text }}</h1>
    <h1>{{ $detail->author->name }}</h1>


</body>

</html>