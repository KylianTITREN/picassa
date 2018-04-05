@extends('layouts.app')

@section('content')

    <style>
        .addPic{display: none;}
    </style>

    <h3>Utilisateurs</h3>
    <ul>
    @foreach($utilisateur as $u)
            <li><a href="/utilisateur/{{$u->id}}" data-pjax>{{$u->name}}</a></li>
    @endforeach
    </ul>

    @include('_album',['albums'=>$albums])

    @include('_photo', ['photo'=>$photos])

@endsection