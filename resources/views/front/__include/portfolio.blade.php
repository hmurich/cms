<div class="cr">
    <div class="title">
        {{ trans('message.port_title') }}
    </div>
    <ul class="porfolio-list">
        @foreach ($ports as $p)
            <li>
                <div class="porfolio-item">
                    <div class="porfolio-video">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $p->youtube_href }}?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <div class="porfolio-text">
                        {{ $lang == 'kz' ? $p->name_kz : $p->name_ru }}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
