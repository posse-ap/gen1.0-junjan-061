<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>タイトルデータ更新</h1>
        <form action="{{ route('admin.update_question', $questions->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            name:<input type="text" name="name" value="ガチで東京の人しか解けない！更新">
                <input type="submit" value="send">
        </form>
</body>
</html>