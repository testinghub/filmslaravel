<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Films</title>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css?').time()}}" />
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
</body>
</html>