<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>データ更新</h1>
    <form action="/admin/{{}}" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" value="{{$id}}">
            <tr><th>name: </th><td><input type="text" name="name" 
                value="{{$form->name}}"></td></tr>
            <tr><th></th><td><input type="submit" 
                value="send"></td></tr>
        </table>
        </form>
</body>
</html>


