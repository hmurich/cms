<div class="cr">
    <div class="title">
        Акции
    </div>
    <ul class="akcii-list">
        @foreach ($sales as $s)
            <li>
                <div class="akcii-item">
                    <div class="akcii-item__img">
                        <img src="/{{ $s->img_path }}">
                    </div>
                    <div class="akcii-item__content">
                        <div class="akcii-item__title">
                            {{ $lang == 'kz' ? $s->name_kz : $s->name_ru }}
                        </div>
                        <div class="akcii-item__text">
                            {!! $lang == 'kz' ? $s->note_kz : $s->note_ru !!}
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
<div class="callback-container">
    <div class="cr">
        <div class="callback-content">
            <div class="callback-text">
                Xотите обсудить Ваш будущий проект ?
            </div>
            <a href="#modal1" class="button open_modal">Да, конечно!</a>
        </div>
    </div>
</div>
