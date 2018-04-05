@extends('layouts.app')

@section('content')

    <div class="publication_photo">

        <div style='height: 750px; width: 100%; margin-bottom: 20px; background-image: url("{{$photo->photo}}"); background-size: cover; background-position: center;'></div>

        <div>

            <strong>
                {{$photo->title}}
            </strong> <br><br>

            @if($photo->utilisateur->id != Auth::id())

            @else
                <a style="font-size: 14px; color: red; font-weight: bold; opacity: 0.3;" href="{{ url('/deletephoto/'.$photo->id) }}" data-pjax-toggle>Supprimer</a>
            @endif

            <hr>

            <small>Publié par <a href="/utilisateur/{{$photo->utilisateur->id}}" style="font-weight: bold; color: #68D3C8;">{{$photo->utilisateur->name}}</a></small>


        </div>

    </div>

@endsection