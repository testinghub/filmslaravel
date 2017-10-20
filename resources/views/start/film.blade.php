@extends('layout.layout')
<link rel='stylesheet' type='text/css' href='{{ URL::asset('css/mediaelementplayer.css') }}' />

@section('right')

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

    <a id='mask' class='masked'>Затемнить</a>
    <div class="mask"></div>
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
            });
    </script>
@endsection
