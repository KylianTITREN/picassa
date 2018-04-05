
<div class="publications_album">
    <strong class='publication_title'>
            Albums

        <mark>{{count($albums)}}</mark>

    </strong>

    <hr>

    <div class="publication_show">

    @foreach($albums->sortByDesc('updated_at') as $m)

        <a href="/album/{{$m->id}}" class="cover" style="margin-bottom: 40px;" data-pjax>

            <div style='height: 100%; width: 100%; margin-bottom: 20px;background-image: url("{{$m->cover_image}}"); background-size: cover; background-position: center;'>

            </div>

            <strong><mark>{{$m->name}} </mark>({{count($m->photo)}})</strong>

        <!-- @if($m->utilisateur->id != Auth::id())

        @else
            <a href="{{ url('/deletealbum/'.$m->id) }}" data-pjax-toggle>Supprimer</a>
        @endif -->

        </a>
    @endforeach

        <a href="/nouvelle2" class="cover addPic" style="margin-bottom: 40px;" data-pjax>

            <div style='height: 100%; width: 100%; margin-bottom: 20px;background-image: url("{{asset('img/add.jpg')}}"); background-size: cover; background-position: center;'>

            </div>

            <strong>Nouvel album</strong>

        </a>

    </div>

</div>