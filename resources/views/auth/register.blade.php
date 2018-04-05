@extends('layouts.app')

@section('content')
<div class="container">

    <style>.show_register{display: none}</style>

    <form method="POST" action="{{ route('register') }}" class="register">
        {{ csrf_field() }}

        <input id="name" type="text" class="form-control" placeholder="Nom" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif

        <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif

        <input id="password" type="password" class="form-control" placeholder="Mot de passe" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
        @endif

        <input id="password-confirm" type="password" class="form-control" placeholder="Confirmer mot de passe" name="password_confirmation" required>

        <button type="submit" class="my-btn" style="cursor: pointer;">Inscription</button>

    </form>
</div>
@endsection
