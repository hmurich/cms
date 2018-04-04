<div class="head-top">
    <div class="cr">
        <div class="head-top__lang">
            <a href="?lang=ru"><img src="/front/img/kazakhstan.svg" alt=""></a>
            <a href="?lang=kz"><img src="/front/img/ru.svg" alt=""></a>
        </div>
        <div class="head-top__socseti">
            <a href="{{ $site_setting->getNameByKey('social_insta') }}"><img src="/front/img/instagram.svg" alt=""></a>
            <a href="{{ $site_setting->getNameByKey('social_vk') }}"><img src="/front/img/facebook.svg" alt=""></a>
        </div>
    </div>
</div>
<div class="head-middle-container">
    <div class=" cr">
        <div class="head-middle">
            <div class="logo">
                <img src="/front/img/logo.png" alt="">
            </div>
            <div class="head-middle-text">
                {!! trans('message.head-middle-text') !!}
            </div>
            <a href="#modal1" class="button open_modal">
                {{ trans('message.buttonopen_modal') }}
            </a>
        </div>
    </div>
</div>
<div class="nav-head fix-nav" id="nav">
    <div class="cr">
        <ul class="menu">
            <li><a href="#about">
                {{ trans('message.about') }}
            </a></li>
            <li><a href="#service">{{ trans('message.service') }}</a></li>
            <li><a href="#portfolio">{{ trans('message.portfolio') }}</a></li>
            <li><a href="#team">{{ trans('message.team') }}</a></li>
            <li><a href="#akcii">{{ trans('message.akcii') }}</a></li>
            <li><a href="#contact">{{ trans('message.contact') }}</a></li>
        </ul>
        <div class="mob_start">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>
</div>
