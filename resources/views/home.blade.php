@extends('layout.layout')

@section('right')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вы успешно вошли!
                </div>
                <a class="home" href="/">На главную</a>
            </div>
        </div>
    </div>
</div>
@endsection
