<div class="publications_album">
    <strong class='publication_title'>
        Photos

        <mark>{{count($photo)}}</mark>

    </strong>

    <hr>

    <div class="publication_show">

        @foreach($photo->sortByDesc('updated_at') as $c)

            <a href="/photo/{{$c->id}}" class="cover" style="margin-bottom: 40px;" data-pjax>

                <div style='height: 100%; width: 100%; margin-bottom: 20px;background-image: url("{{$c->photo}}"); background-size: cover; background-position: center;'>

                </div>

                <strong><mark>{{$c->title}}</mark></strong>

            </a>
        @endforeach

            <a href="/nouvelle" class="cover addPic" style="margin-bottom: 40px;" data-pjax>

                <div style='height: 100%; width: 100%; margin-bottom: 20px;background-image: url("{{asset('img/add.jpg')}}"); background-size: cover; background-position: center;'>

                </div>

                <strong>Nouvelle photo</strong>

            </a>

    </div>
</div>