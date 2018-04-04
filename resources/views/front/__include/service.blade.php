<div class="cr">
    <div class="title">
        {{ trans('message.service-title') }}
    </div>
    <div class="tabs">
        <ul class="tabs-head">
            @foreach ($services as $s)
                <li class="{{ $loop->first ? 'active' : null }}">{!! $lang == 'kz' ? $s->name_kz : $s->name_ru !!}</li>
            @endforeach
        </ul>
        <div class="tabs-head-body">
            @foreach ($services as $s)
                <div class="tabs-body__item {{ $loop->first ? 'active' : null }}">
                    <div class="service-content">
                        <div class="service-left">
                            <div class="service-title">
                                {{ trans('message.service-li-1') }}
                            </div>
                            <div class="service-text">
                                {!! $lang == 'kz' ? $s->note_kz : $s->note_ru !!}
                            </div>
                            <a href="#modal1" class="button open_modal service-button">{{ trans('message.service-button') }}</a>
                        </div>
                        <div class="service-right">
                            <div class="service-slider">
                                @foreach ($s->relImg as $b)
                                    <div class="service-slider__item">
                                        <img src="/{{ $b->img_path }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
