@extends('layouts.app')

@section('content')

    <style>
        .create div:hover .choose_picture{
            filter: brightness(0.6);
            cursor: pointer;
        }

        .create div:hover small{
            cursor : pointer;
        }
    </style>

    <div class="publications_album">
        <strong>
            Nouvelle

            <mark>photo</mark>

        </strong>

        <hr>

    @include('_errors')

    <form action="/creer" data-pjax method="post" enctype="multipart/form-data" class="create">

        <input type="text" class="element_input" name="nom" required autofocus placeholder="Nom de la photo" value="{{old('nom')}}"/>

        <input type="file" id="fileInput" name="photo" required style="display: none"/>

        <div style="display: flex; align-items: center"  onclick="chooseFile();" >
            <div class='choose_picture' style='background-image: url("{{asset('img/add.jpg')}}"); border-radius: 50%; height: 50px; width: 50px; background-size: cover; background-position: center;'></div>
            <small style="margin-left: 30px; font-size: 20px;">Ajouter une photo</small>
        </div>

        <select name="albums" size="1" id="albums">
            <option value="" disabled selected>Albums :</option>
            @foreach($albums as $m)
                <option value="{{$m->id}}">{{$m->name}}</option>
            @endforeach
        </select>

        <a href="/nouvelle2" style="color: #68D8C3; font-weight: bold; text-decoration: underline">Ajouter un nouvel album</a>

        {{csrf_field()}}
        <input type="submit" class="my-btn" value="Publier"/>
        
    </form>

        <script>
            function chooseFile() {
                $("#fileInput").click();
            }
        </script>
    
@endsection 