@extends('layouts.app')

@section('content')

    <div class="publications_album">

        <strong class='publication_title'>
            Abonnements

            <mark>{{count($utilisateur->follow)}}</mark>

        </strong>

        <div class="show-memmbers">
        @foreach($utilisateur->follow as $u)
            <a href="/utilisateur/{{$u->id}}" data-pjax><div class="profilpic" style="background-image: url('/uploads/avatar/{{ $u->avatar }}'); background-size: cover; background-position: center;"></div>{{$u->name}}</a>
        @endforeach
    </div>

    </div>

@endsection