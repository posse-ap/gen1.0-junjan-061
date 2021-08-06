@extends('layouts.quizy')

@section('title','index')

@section('quiz')
    @foreach ($items as $item)
    <div class="quiz">
        <h1>この地名はなんて読む？</h1>
        <img src="">
        <ul>
            <li id="answerlist_1_1" name="answerlist_1" class="answerlist" onclick="check(1, 1, 2)">{{$item->name}}</li>
            <li id="answerlist_1_2" name="answerlist_1" class="answerlist" onclick="check(1, 2, 2)">{{$item->name}}</li>
            <li id="answerlist_1_3" name="answerlist_1" class="answerlist" onclick="check(1, 3, 2)">{{$item->name}}</li>
            <li id="answerbox_1" class="answerbox">
                <span id="answertext_1"></span><br>
                <span>正解は「たかなわ」です！</span>
            </li>
        </ul>
    </div>
    @endforeach
@endsection