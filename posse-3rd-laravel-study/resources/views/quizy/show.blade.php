<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

    {{-- <p>{{ $themes['name'] }}</p> --}}
    {{-- <p>{{$choice['name']}}</p> --}}
    @foreach ($themes as $theme)

    <p>{{$theme['name']}}</p>
    @foreach ($choices->where('theme_id', $theme->id) as $choice)
        <p>{{$choice['name']}}</p>
    @endforeach

    <img src="/img/{{ $theme->image }}">

    @endforeach

</body>
</html>
