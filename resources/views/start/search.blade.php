@extends('layout.layout')

@section('right')
    @if($film == '[]')<div class="sorry">{{'Простите но по вашему запросу ничего не найдено'}}</div>
    @else {{''}}
    @endif

    {!! dump($film) !!}

    @foreach($film as $films)
        <div class="box">
            <a class="box-item" href="/{{$films->id}}">
                <img class="img" src="{{$films->img}}" width="140px" height="215px" alt="">
                <div class="name">{{$films->name}}</div>
                <div class="opt">{{mb_substr($films->options, 0, 200)}}...</div>
            </a>
        </div>
    @endforeach
    {{$film->links()}}
@endsection