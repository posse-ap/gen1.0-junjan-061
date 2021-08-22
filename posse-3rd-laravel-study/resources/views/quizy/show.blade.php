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