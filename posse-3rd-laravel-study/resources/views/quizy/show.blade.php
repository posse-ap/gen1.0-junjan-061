{{-- @extends('layouts.quizy')

@section('title','index') --}}

{{-- @section('quiz')
    @section('content')
    @foreach ($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
            <td>
            @if ($item->choices != null)
                <table width="100%">
                @foreach ($item->choices as $obj)
                    <tr><td>{{$obj->getData()}}</td></tr>
                @endforeach
                </table>
            @endif
            </td>
        </tr>
    @endforeach
@endsection
@endsection --}}

{{-- @foreach ($items->questions as $item)
<tr>
    @foreach ($item as $quiz)
        <tr><td>{{$quiz->getData_2()}}</td></tr>
    @endforeach
    @if ($item->choices != null)
        <table width="100%">
        @foreach ($item->choices as $obj)
            <tr><td>{{$obj->getData_2()}}</td></tr>
        @endforeach
        </table>
    @endif 
    <tr><td>{{$item->getData_2()}}</td></tr>
</tr>
@endforeach --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($items as $quiz)
    <p>{{$quiz->getData_2()}}</p>
    @endforeach

</body>
</html>
