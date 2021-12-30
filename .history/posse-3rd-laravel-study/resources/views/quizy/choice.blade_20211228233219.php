<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($choices as $choice)

    <form action="{{ route('admin.update_choice', $choice->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        選択肢:<input type="text" name="name" value="{{$choice->name}}">
            <input type="submit" value="更新">
    </form> 

    @endforeach
</body>
</html>