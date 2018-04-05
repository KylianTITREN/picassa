@extends('layouts.app')

@section('content')

    @guest

        @else

    <form id="search" data-pjax>
        <input type="search" name="search" placeholder="Rechercher" required>
        <input type="submit" style="display: none">
    </form>

    @include('_album', ['albums'=>$albums])

    @include('_photo', ['photo'=>$photos])

    @endguest

@endsection