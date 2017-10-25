@extends('layout.layout')
<link rel='stylesheet' type='text/css' href='{{ URL::asset('css/mediaelementplayer.css') }}' />

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

    <div class='option'>
        <div class='name-film'>{{$film->name}} - смотреть онлайн</div>

        <div class='option-item'>
            <img class='img-film' src='{{$film->img}}' width='360px' height='533px' alt=''>
            <div class='option-text'>{{$film->options}}</div>

            <div class='rating'>
                <input type='radio' id='star5'  value='5' disabled @if($film->assessment == 5){{'checked'}}@endif/>
                <label class = 'full' for='star5'></label>
                <input type='radio' id='star4half'  disabled value='4 and a half' @if($film->assessment == 4.5){{'checked'}}@endif/>
                <label class='half' for='star4half'></label>
                <input type='radio' id='star4'  disabled value='4' @if($film->assessment == 4){{'checked'}}@endif/>
                <label class = 'full' for='star4'></label>
                <input type='radio' id='star3half'  disabled value='3 and a half' @if($film->assessment == 3.5){{'checked'}}@endif/>
                <label class='half' for='star3half'></label>
                <input type='radio' id='star3'  disabled value='3' @if($film->assessment == 3){{'checked'}}@endif/>
                <label class = 'full' for='star3' ></label>
                <input type='radio' id='star2half'  disabled value='2 and a half' @if($film->assessment == 2.5){{'checked'}}@endif/>
                <label class='half' for='star2half'></label>
                <input type='radio' id='star2'  disabled value='2' @if($film->assessment == 2){{'checked'}}@endif/>
                <label class = 'full' for='star2' ></label>
                <input type='radio' id='star1half'  disabled value='1 and a half' @if($film->assessment == 1.5){{'checked'}}@endif/>
                <label class='half' for='star1half'></label>
                <input type='radio' id='star1'  disabled value='1' @if($film->assessment == 1){{'checked'}}@endif/>
                <label class = 'full' for='star1'></label>
                <input type='radio' id='starhalf'  disabled value='half' @if($film->assessment == 0.5){{'checked'}}@endif/>
                <label class='half' for='starhalf' ></label>
            </div>
            <div class='genre'>Жанр:
                @foreach($keys as $key => $value)
                    <a>
                            @if(in_array( $value,explode(",", $film->genre))){{$key}}
                            @endif
                    </a>
                @endforeach
            </div>

        </div>
    </div>
    <div class='line'></div>
    <div class='film' id='film'>Смотреть онлайн</div>
    <div class='film' id='previve'>Трейлер</div>
    <video id='video' class='video'>
        <source src='{{$film->film}}' type='video/mp4'>
    </video>
    <iframe id='prev' class='prev' width="765" height="383" src='https://www.youtube.com/embed/{{$film->youtube}}' frameborder='0'></iframe>
    <div class="mask"></div>
    <a id='mask' class='masked'>Затемнить</a>

    <div class='line'></div>

    @guest
        <div class="guest">Чтобы оставить отзыв о фильме вам надо <a class="log" href="{{ route('login') }}">войти</a>, или <a class="reg" href="{{ route('register') }}">зарегистрироваться</a>!</div>
    @else
        <div class='comment'>
            <div class="comment-text">Оставте ваш отзыв</div>
            <form id="comment" action="/{{$film->id}}" method="post">
                <input id="comment-text" class="comment-textarea" maxlength="200" type="text" name="comment">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button id="send" type="submit" class="comment-btn"> Отправить </button>
            </form>

        </div>
    @endguest
    <div class='line'></div>
    <div class="user-comment" id="commetn-list">
        @if($count == '0')
        <div class="comment-text">{{"Под этим фильмом еще нет отзывов, станьте первым"}}</div>
        @endif
        @include('start.ajax-comment')
            {{--@foreach($users as $user)--}}
                {{--<div class="user-comment-box">--}}
                    {{--<div class="name">{{$user->name}}</div>--}}
                    {{--<div class="date">{{date('j-m-Y H:m',$user->time)}}</div>--}}
                    {{--<br>--}}
                    {{--<div class="text">{{$user->text}}</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}

    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{URL::asset('js/mediaelement-and-player.js')}}"></script>
    <script type='text/javascript' >
            jQuery(function() {
                jQuery('video').mediaelementplayer({
                    alwaysShowControls: true,
                    videoVolume: 'horizontal',
                    features: ['playpause','progress','volume','fullscreen']
                });

                jQuery('#mask').on('click', function () {
                    if(jQuery('div[class=mask]').css('display') == 'none'){
                        jQuery('div[class=mask]').fadeIn(1000);
                    }else {
                        jQuery('div[class=mask]').fadeOut(1000);
                    }
                });
                jQuery('#film').addClass('act');

                jQuery('#film').on('click', function () {
                    if(jQuery('#mep_0').css('display') == 'none'){
                        jQuery('#mep_0').show();
                        jQuery('#prev').hide();
                        jQuery('#film').addClass('act');
                        jQuery('#previve').removeClass('act');
                    }
                });
                jQuery('#previve').on('click', function () {
                    if(jQuery('#prev').css('display') == 'none') {
                        jQuery('#mep_0').hide();
                        jQuery('#prev').show();
                        jQuery('#film').removeClass('act');
                        jQuery('#previve').addClass('act');
                    }
                });
                jQuery('#comment').on('submit', function (e) {
                    e.preventDefault();
                    var $this = $(this);
                    var $send = jQuery('#send');
                    $send.prop('disabled', true);

                    $.ajax({
                        method: 'POST',
                        data: $this.serializeArray(),
                        dataType: 'JSON',
                        success: function (event) {
                            $('#comment-text').val('');
                            $send.prop('disabled', false);

                        },
                        error: function (message) {}
                    });

                });

                function getcomment() {
                    $.ajax({
                        method: "GET",
                        url:'/comment/{{$film->id}}',
                        datatype:'html',
                        cache: false,
                        success: function(response) {
                            console.log(response);
                            if(response == 0) {  // смотрим ответ от сервера и выполняем соответствующее действие
                                alert("Больше нет записей");
                            }else{
                                jQuery('#commetn-list').html(response);
                            }
                        }
                    });
                }
                setInterval(getcomment, 1000);

            });
    </script>
@endsection
