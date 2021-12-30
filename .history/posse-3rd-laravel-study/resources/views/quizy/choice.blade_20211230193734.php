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
            <input type="radio" name="valid" value="1">正解
            <input type="radio" name="valid" value="0" checked>不正解
                <input type="submit" value="更新">
        </form> 
        <form action = "{{ route( 'admin.destroy_title', [ 'question_id'=>$question['id'] ] ) }}" method="post">
            @csrf
            <input type="submit" value="選択肢を削除">
        </form>
    @endforeach

    <p>選択肢追加</p>
    <table>
        <form action= "{{ route('admin.store_choice', $choice->theme_id)}}" method="post">
        @csrf
            <tr><th>選択肢: </th><td>
            <input type="text" name="name" value=""> <br>
            <input type="radio" name="valid" value="1">正解
            <input type="radio" name="valid" value="0" checked>不正解
            <input type="hidden" name='theme_id' value="{{$choice->theme_id}}">
            </td></tr>
            <tr><th></th><td><input type="submit" value="選択肢追加"></td></tr>
        </form>
    </table>
</body>
</html>