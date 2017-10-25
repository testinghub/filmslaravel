@extends('layout.layout')

@section('right')
    <div class="owl-carousel">
        @foreach($rec as $rec)
            <a href="/{{$rec->id}}">
                <div class="item">

                    <img src="{{$rec->img}}" width="97px" height="150px" alt="{{$rec->name}}">
                    <div class="item-name">{{$rec->name}}</div>

                </div>
            </a>
        @endforeach
    </div>

    <div class="films">
        @if(count($film) == 0)<div class="sorry">{{'Простите но по вашему запросу ничего не найдено'}}</div>
        @else {{''}}
        @endif

        @foreach($film as $films)
            <div class="box">
                <a class="box-item" href="/{{$films->id}}">
                    <img class="img" src="{{$films->img}}" width="110" height="170" alt="">
                    <div class="name">{{$films->name}}</div>
                    <div class="opt">{{mb_substr($films->options, 0, 200)}}...</div>
                    <div class='genre'>Жанр:
                        @foreach($keys as $key => $value)
                            <a>
                                @if(in_array( $value,explode(",", $films->genre))){{$key}}
                                @endif
                            </a>
                        @endforeach
                    </div>
                </a>

            </div>
        @endforeach
    </div>
    {{$film->links()}}

@endsection