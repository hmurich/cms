<div class="cr">
    <div class="about-content">
        <div class="about-left">
            <div class="about-img">
                <img src="/front/img/about-img.jpg" alt="">
            </div>
        </div>
        <div class="about-right" >
            <div class="about-title">
                {{ trans('message.about-title') }}
            </div>
            <div class="about-text wow fadeInUp " data-wow-delay=".9s">
                {!! $lang == 'kz' ? $about->note_kz : $about->note_ru !!}
            </div>
        </div>
    </div>
</div>
