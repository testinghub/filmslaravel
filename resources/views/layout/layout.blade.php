<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Films</title>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css?').time()}}" />

    <script  src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
    <script type='text/javascript' src='{{ URL::asset('js/mediaelement-and-player.js') }}'></script>
</head>
<body>
@section('header')
<div class="menu">
    <div class="regs">
        @guest
            <a class="log" href="{{ route('login') }}">Вход</a>
            <a class="reg" href="{{ route('register') }}">Регистрация</a>
            @else

                    <a href="#" class="user-name" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <a  class="logout"  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
        @endguest
    </div>
    <form action="/search" method="post">
        <input class="search" type="text" placeholder="Поиск" name="search">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@show
<div class="center">
    <div class="column">
        @section('left')
        <div class="left">

        </div>
        @show
        <div class="right">
            @section('right')
            @show
        </div>

    </div>
</div>
</div>
@section('script')

    <script type='text/javascript' >
        $(function() {
            jQuery('video').mediaelementplayer({
                alwaysShowControls: true,
                videoVolume: 'horizontal',
                features: ['playpause','progress','volume','fullscreen']
            });

            jQuery('#mask').on('click', function () {
                if(jQuery('div[class=mask]').css('display') > 'none'){
                    jQuery('div[class=mask]').fadeIn(1000);
                }else {
                    jQuery('div[class=mask]').fadeOut(1000);

                }
            });
            jQuery('#film').addClass('act');
            jQuery('#film').on('click', function () {
                if(jQuery('#mep_0').css('display') > 'none'){
                    jQuery('#mep_0').show();
                    jQuery('#prev').hide();
                    jQuery('#film').addClass('act');
                    jQuery('#previve').removeClass('act');
                }
            });
            jQuery('#previve').on('click', function () {
                if(jQuery('#prev').css('display') > 'none') {
                    jQuery('#mep_0').hide();
                    jQuery('#prev').show();
                    jQuery('#film').removeClass('act');
                    jQuery('#previve').addClass('act');
                }
            });
        });
    </script>
@show
</body>
</html>