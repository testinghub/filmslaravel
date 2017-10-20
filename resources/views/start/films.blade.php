@extends('layout.layout')

@section('right')

        <div class="owl-carousel">
            @foreach($rec as $rec)
            <a href="/{{$rec->id}}">
                <img  src="{{$rec->img}}" width="97px" height="150px" alt="">
            </a>
            @endforeach
        </div>

    <div class="films">
        @foreach($film as $films)
            <div class="box">
                <a class="box-item" href="/{{$films->id}}">
                    <img class="img" src="{{$films->img}}" width="110px" height="170px" alt="">
                    <div class="name">{{$films->name}}</div>
                    <div class="opt">{{mb_substr($films->options, 0, 200)}}...</div>
                    <i class="fa fa-eye eye" aria-hidden="true"><div>{{$films->views}}</div></i>
                </a>
            </div>
        @endforeach
        {{$film->links()}}
    </div>
@endsection