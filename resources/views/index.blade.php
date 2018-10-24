@extends('layouts.app')

@section('content')

    @guest

        @else

    <form id="search">
        <input type="search" name="recherche" placeholder="Rechercher" required>

        <input type="submit" style="display: none">
    </form>

    @include('_album', ['albums'=>$albums])

    @include('_photo', ['photo'=>$photos])

    @endguest

@endsection
