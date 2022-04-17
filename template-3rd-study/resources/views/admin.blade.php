<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザ―管理</title>
</head>

<body>
    @foreach ($users as $user)
        <form action="{{ route('admin.update_user', $user->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            名前:<input type="text" name="name" value="{{ $user->name }}">
            email:<input type="text" name="email" value="{{ $user->email }}">
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="submit" value="更新">
        </form>
        <form action="{{ route('admin.destroy_user', $user->id) }}" method="post">
            @csrf
            <input type="submit" value="アカウントを削除">
            <input type="hidden" name="id" value="{{ $user->id }}">
        </form>
    @endforeach

    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                {{-- <a href="{{ route('login') }}">Login</a> --}}

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">ユーザ―登録</a>
                @endif
            @endauth
        </div>
    @endif

    @foreach ($languages as $language)
        <form action="{{ route('admin.update_language', $language->id) }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            <input type="text" name="language" value="{{ $language->language }}">
            <input type="hidden" name="id" value="{{ $language->id }}">
            <input type="submit" value="更新">
        </form>
        <form action="{{ route('admin.destroy_language', $language->id) }}" method="post">
            @csrf
            <input type="submit" value="言語を削除">
            <input type="hidden" name="id" value="{{ $language->id }}">
        </form>
    @endforeach

    <p> 言語追加❤</p>
    <table>
        <form action= "{{ route('admin.store_language')}}" method="post">
        @csrf
            <tr><th>言語: </th><td><input type="text" name="language"
            value=""></td></tr>
            <tr><th></th><td><input type="submit" value="言語追加"></td></tr>
    </form>
    </table>

    @foreach ($contents as $content)
        <form action="{{ route('admin.update_content', $content->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="text" name="content" value="{{ $content->contents }}">
            <input type="hidden" name="id" value="{{ $content->id }}">
            <input type="submit" value="更新">
        </form>
        <form action="{{ route('admin.destroy_content', $content->id) }}" method="post">
            @csrf
            <input type="submit" value="コンテンツを削除">
            <input type="hidden" name="id" value="{{ $content->id }}">
        </form>
    @endforeach
    <p> 言語追加❤</p>
    <table>
        <form action= "{{ route('admin.store_content')}}" method="post">
        @csrf
            <tr><th>学習コンテンツ: </th><td><input type="text" name="content"
            value=""></td></tr>
            <tr><th></th><td><input type="submit" value="コンテンツ追加"></td></tr>
    </form>
    </table>
</body>

</html>
