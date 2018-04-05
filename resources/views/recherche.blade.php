@extends('layouts.app')

@section('content')

    <style>
        .addPic{display: none;}
    </style>

    <form id="search" data-pjax>
        <input type="search" name="search" placeholder="Rechercher" required>
        <input type="submit" style="display: none">
    </form>

    <div class="publications_album">
        <strong class='publication_title'>
            Utilisateurs

            <mark>{{count($utilisateur)}}</mark>

        </strong>

        <hr>

        <div class="show-memmbers">
    @foreach($utilisateur as $u)
            <a href="/utilisateur/{{$u->id}}" data-pjax><div class="profilpic" style="background-image: url('/uploads/avatar/{{ $u->avatar }}'); background-size: cover; background-position: center;"></div>{{$u->name}}</a>
    @endforeach
        </div>

    @include('_album',['albums'=>$albums])

    @include('_photo', ['photo'=>$photos])

@endsection