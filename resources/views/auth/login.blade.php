@extends('layouts.app')

@section('content')
<div class="container">

    <style>.show_register{display: none}</style>

                    <form method="POST" action="{{ route('login') }}" class="register">
                        {{ csrf_field() }}

                        <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}" required autofocus>

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

                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                        </label>

                        <button type="submit" class="my-btn">Connexion</button>

                    </form>
</div>
@endsection