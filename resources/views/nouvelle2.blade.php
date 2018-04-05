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
            Nouvel

            <mark>album</mark>

        </strong>

        <hr>

    @include('_errors')

    <form action="/creeralbum" data-pjax method="post" enctype="multipart/form-data" class="create">

            <input type="text" name="name" class="element_input" autofocus placeholder="Nom de l'album">

            <textarea name="desc" id="description_album" cols="30" rows="10" placeholder="Descripiton de l'album"></textarea>

            <input type="file" id="fileInput" name="cover_image" style="display: none;">

        <div style="display: flex; align-items: center"  onclick="chooseFile();" >
            <div class='choose_picture' style='background-image: url("{{asset('img/add.jpg')}}"); border-radius: 50%; height: 50px; width: 50px; background-size: cover; background-position: center;'></div>
            <small style="margin-left: 30px; font-size: 20px;">Ajouter une photo de couverture</small>
        </div>

        {{csrf_field()}}
        <input type="submit" class="my-btn" value="Ajouter"/>
        
    </form>

        <script>
            function chooseFile() {
                $("#fileInput").click();
            }
        </script>

@endsection 