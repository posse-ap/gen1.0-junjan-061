@extends('layouts.quizy')

@section('title','index')

@section('quiz')
    @foreach ($items as $item)
    <tr>
        {{-- <td>{{$item->getData()}}</td> --}}
        <td>@if ($item->choices != null)
                {{$item->choices->getData()}}
            @endif
        </td>
    </tr>
    @endforeach
@endsection