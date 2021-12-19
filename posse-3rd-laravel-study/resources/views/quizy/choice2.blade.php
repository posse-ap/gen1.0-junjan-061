    @foreach ($questions as $question)
        <form action="/admin/{{$question->id}}" method="get">
            @csrf
            @method('PUT')
            name:<input type="text" name="name" 
            value="ガチで東京の人しか解けない！更新">
            <input type="submit" value="send">
        </form>
        @foreach ($themes as $theme)

    <p>{{$theme['name']}}</p>
    {{-- <a href="{{ route( 'admin.delete', [ 'theme_id'=>$theme['id'] ] ) }}">削除</a>
    <a href="{{ route( 'admin.edit', [ 'theme_id'=>$theme['id'] ] ) }}">編集</a> --}}
            @foreach ($choices->where('theme_id', $theme->id) as $choice)

    <form method="POST" action="{{ route('admin.update', ['question_id'=>$question->id, 'theme_id'=>$theme->id]) }}">
    {{-- <form method="POST" action="{{ route('admin.update')}}"> --}}
    {{-- <form method="POST" action="{{ action('CrazyController@update') }}"> --}}
    @csrf
    {{-- @method('PUT') --}}
    {{-- <input type="hidden" name="id" value="{{$theme->question_id}}"> --}}
    <input type="hidden" name="id" value="{{$choice->theme_id}}">
    {{-- <input type="hidden" name="id" value="{{$question->id}}"> --}}
    <input type="text" method="post" name='name' value="{{$choice->name}}">
    <input type="submit" value="更新ダオォォ">
    </form>
    @endforeach

    <img src="/img/{{ $theme->image }}">

        @endforeach
    @endforeach

更新するボタン

    {{-- ここに更新ボタン億 --}}

