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

@foreach ($items as $quiz)
<tr>
    @foreach ($quiz->show as $obj)
        <tr><td>{{$obj->getData_2()}}</td></tr>
    @endforeach
    {{-- @if ($item->choices != null)
        <table width="100%">
        @foreach ($item->choices as $obj)
            <tr><td>{{$obj->getData_2()}}</td></tr>
        @endforeach
        </table>
    @endif --}}
    {{-- <tr><td>{{$item->getData_2()}}</td></tr> --}}
</tr>
@endforeach