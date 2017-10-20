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
        @foreach($film as $films)
            <div class="box">
                <a class="box-item" href="/{{$films->id}}">
                    <img class="img" src="{{$films->img}}" width="110px" height="170px" alt="">
                    <div class="name">{{$films->name}}</div>
                    <div class="opt">{{mb_substr($films->options, 0, 200)}}...</div>
                    <div class='rating all'>
                        <input type='radio' id='star5'  value='5' disabled @if($films->assessment == 5){{'checked'}}@endif/>
                        <label class = 'full' for='star5'></label>
                        <input type='radio' id='star4half'  disabled value='4 and a half' @if($films->assessment == 4.5){{'checked'}}@endif/>
                        <label class='half' for='star4half'></label>
                        <input type='radio' id='star4'  disabled value='4' @if($films->assessment == 4){{'checked'}}@endif/>
                        <label class = 'full' for='star4'></label>
                        <input type='radio' id='star3half'  disabled value='3 and a half' @if($films->assessment == 3.5){{'checked'}}@endif/>
                        <label class='half' for='star3half'></label>
                        <input type='radio' id='star3'  disabled value='3' @if($films->assessment == 3){{'checked'}}@endif/>
                        <label class = 'full' for='star3' ></label>
                        <input type='radio' id='star2half'  disabled value='2 and a half' @if($films->assessment == 2.5){{'checked'}}@endif/>
                        <label class='half' for='star2half'></label>
                        <input type='radio' id='star2'  disabled value='2' @if($films->assessment == 2){{'checked'}}@endif/>
                        <label class = 'full' for='star2' ></label>
                        <input type='radio' id='star1half'  disabled value='1 and a half' @if($films->assessment == 1.5){{'checked'}}@endif/>
                        <label class='half' for='star1half'></label>
                        <input type='radio' id='star1'  disabled value='1' @if($films->assessment == 1){{'checked'}}@endif/>
                        <label class = 'full' for='star1'></label>
                        <input type='radio' id='starhalf'  disabled value='half' @if($films->assessment == 0.5){{'checked'}}@endif/>
                        <label class='half' for='starhalf' ></label>
                    </div>
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
            {{$film->links()}}
    </div>
@endsection