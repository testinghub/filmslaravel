@extends('layout.layout')
<link rel='stylesheet' type='text/css' href='{{ URL::asset('css/mediaelementplayer.css') }}' />

<script  src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type='text/javascript' src='{{ URL::asset('js/mediaelement-and-player.js') }}'></script>
<script type='text/javascript' src='{{ URL::asset('js/script.js') }}'></script>




@foreach($film as $film)
@section('right')
    <div class='option'>
        <div class='name-film'>{{$film->name}} - смотреть онлайн</div>

        <div class='option-item'>
            <img class='img-film' src='{{$film->img}}' width='360px' height='533px' alt=''>
            <div class='option-text'>{{$film->options}}</div>

            <div class='rating'>
                <input type='radio' id='star5' name='rating' value='5' disabled @if($film->assessment == 5){{'checked'}}@endif/>
                <label class = 'full' for='star5'></label>
                <input type='radio' id='star4half' name='rating' disabled value='4 and a half' @if($film->assessment == 4.5){{'checked'}}@endif/>
                <label class='half' for='star4half'></label>
                <input type='radio' id='star4' name='rating' disabled value='4' @if($film->assessment == 4){{'checked'}}@endif/>
                <label class = 'full' for='star4'></label>
                <input type='radio' id='star3half' name='rating' disabled value='3 and a half' @if($film->assessment == 3.5){{'checked'}}@endif/>
                <label class='half' for='star3half'></label>
                <input type='radio' id='star3' name='rating' disabled value='3' @if($film->assessment == 3){{'checked'}}@endif/>
                <label class = 'full' for='star3' ></label>
                <input type='radio' id='star2half' name='rating' disabled value='2 and a half' @if($film->assessment == 2.5){{'checked'}}@endif/>
                <label class='half' for='star2half'></label>
                <input type='radio' id='star2' name='rating' disabled value='2' @if($film->assessment == 2){{'checked'}}@endif/>
                <label class = 'full' for='star2' ></label>
                <input type='radio' id='star1half' name='rating' disabled value='1 and a half' @if($film->assessment == 1.5){{'checked'}}@endif/>
                <label class='half' for='star1half'></label>
                <input type='radio' id='star1' name='rating' disabled value='1' @if($film->assessment == 1){{'checked'}}@endif/>
                <label class = 'full' for='star1'></label>
                <input type='radio' id='starhalf' name='rating' disabled value='half' @if($film->assessment == 0.5){{'checked'}}@endif/>
                <label class='half' for='starhalf' ></label>
            </div>

            <div class='genre'>Жанр: {{$film->genre}}</div>
        </div>
    </div>
    <div class='line'></div>
    <div class='film' id='film'>Смотреть онлайн</div>
    <div class='film' id='previve'>Трейлер</div>
    <video id='video' class='video'>
        <source src='{{$film->film}}' type='video/mp4'>
    </video>
    <iframe id='prev' class='prev' width='600' height='300' src='https://www.youtube.com/embed/{{$film->youtube}}' frameborder='0' allowfullscreen></iframe>

    <a id='mask' class='masked'>Затемнить</a>

@endsection
@endforeach