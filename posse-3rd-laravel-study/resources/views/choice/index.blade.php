@extends('layouts.quizy')

@section('title','index')

@section('quiz')
    @foreach ($items as $item)
        {{-- <td>{{$item->getData()}}</td> --}}
        {{-- <td>@if ($item->choice != null)
                {{$item->choice->getData()}}
            @endif
        </td> --}}
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->question->id}}</td>
        </tr>
    @endforeach
@endsection