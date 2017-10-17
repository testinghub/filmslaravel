@extends('layout.layout')

@section('right')
    <div class="page-name">Регистрация</div>

    <form class="register" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Имя</label><br>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                   autofocus><br>
            @if ($errors->has('name'))
                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Ваша почта</label><br>


            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Пароль</label><br>
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Подтверждение пароля</label>
            <br>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>


        <div class="form-group">

            <button type="submit" class="btn-auth">
                Зарегистрироваться
            </button>

        </div>
    </form>
@endsection
