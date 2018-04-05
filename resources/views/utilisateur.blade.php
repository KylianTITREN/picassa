@extends('layouts.app')

@section('content')

    @if($utilisateur->id != Auth::id())

        <style>
            .addPic{
                display: none;
            }
        </style>

    @else

    <style>

    .user .profilpic2:hover span{
        opacity: 0.5!important;
        cursor: pointer;
    }

    </style>

    @endif


    <div class="user">
        <div @if($utilisateur->id != Auth::id()) @else onclick="chooseFile();" @endif class="profilpic2" style="background-image: url('/uploads/avatar/{{ $utilisateur->avatar}}'); overflow: hidden; background-size: cover; background-position: center;">
            <span style="display: flex; opacity: 0; background-color: black; align-items: center; justify-content: center; font-weight: bold; font-size: 40px; color: white; height: 100%;">+</span>
        </div>

        <div class="user-info">
            <strong>{{$utilisateur->name}}</strong>

            <div class="user-counter">
                <small>
                    <mark>{{count($utilisateur->follow)}}</mark>
                    @if(count($utilisateur->follow)>1)
                        abonnements
                    @else
                        abonnement
                    @endif
                </small>

                <small>
                    <mark>{{count($utilisateur->followMe)}}</mark>
                    @if(count($utilisateur->follow)>1)
                        abonné(e)s
                    @else
                        abonné(e)
                    @endif
                </small>

                <small>
                    <mark>{{count($utilisateur->photo)}}</mark>
                    @if(count($utilisateur->follow)>1)
                        photo publiée
                    @else
                        photos publiées
                    @endif
                </small>
            </div>
        </div>
    </div>

    <div class="user-edit">



        @if($utilisateur->id != Auth::id())
            @if(Auth::user()->follow->contains($utilisateur->id))
                <button class="my-btn2"><a href="/suivi/{{$utilisateur->id}}" data-pjax-toggle>Ne plus suivre</a></button>
            @else
                <button class="my-btn2"><a href="/suivi/{{$utilisateur->id}}" data-pjax-toggle>Suivre</a></button>
            @endif

        @else
            <button class="my-btn"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a></button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

            <form enctype="multipart/form-data" action="/utilisateur" method="POST" >
                <input type="file" id="fileInput" name="avatar" style="display: none;" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}"style="display: none;" >
                <input type="submit" class="choos_pic" value="√">
            </form>

            <script>
                function chooseFile() {
                    $("#fileInput").click();
                    $('.choos_pic').fadeIn();
                }
            </script>
        @endif

    </div>


    @include('_album', ['albums'=>$utilisateur->album])

    @include('_photo', ['photo'=>$utilisateur->photo])



@endsection

