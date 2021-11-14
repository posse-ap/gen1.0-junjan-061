<p>問題番号（1~10のプルダウン</p> <br>

    {{-- ここに問題番号を出力して、プルダウンで編集できるようにする --}}
<p>画像（ファイルのアップロード</p> <br>


    {{-- ここにアップロードの処理書く --}}
<p>選択肢3つ（textbox</p> <br>


    {{-- ここに選択肢出力 --}}
    @foreach ($questions as $question)
    @foreach ($themes as $theme)

    <p>{{$theme['name']}}</p>
    {{-- <a href="{{ route( 'admin.delete', [ 'theme_id'=>$theme['id'] ] ) }}">削除</a>
    <a href="{{ route( 'admin.edit', [ 'theme_id'=>$theme['id'] ] ) }}">編集</a> --}}
    @foreach ($choices->where('theme_id', $theme->id) as $choice)

    <form method="POST" action="{{ route('admin.update', ['question_id'->$question['id'], 'theme_id'->$theme['id']]) }}">
    <form method="POST" action="{{ route('admin.update' }}">
    {{-- <form method="POST" action="{{ action('CrazyController@update') }}"> --}}
    @csrf
    <input type="hidden" name="id" value="{{$theme->id}}">
    <input type="text" method="post" value="{{$choice['name']}}">

    </form>

    <form action="/admin/{{$question->id}}" method="post">
        @csrf
        @method('PUT')
        name:<input type="text" name="name" 
        value="ガチで東京の人しか解けない！更新">
        <input type="submit" value="send">
    </form>
    @endforeach

    <img src="/img/{{ $theme->image }}">

    @endforeach
    @endforeach
    

更新するボタン

    {{-- ここに更新ボタン億 --}}

