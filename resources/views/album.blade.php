@extends('layouts.app')

@section('content')

    <style>.addPic{display: none;} .publications_album .publication_title{display: none;} .publications_album hr{display: none;}</style>

    <div class="publications_album">
        <strong>
            {{$album->name}}

            <mark>{{count($album->photo)}}</mark>

        </strong>

        <hr style="display: block!important;">

        <small>Publié par <a href="/utilisateur/{{$album->utilisateur->id}}" style="font-weight: bold; color: #68D3C8;">{{$album->utilisateur->name}}</a></small>

        <p>{{$album->description}}</p>


    @include('_photo', ['photo'=>$album->photo])

    </div>

@endsection