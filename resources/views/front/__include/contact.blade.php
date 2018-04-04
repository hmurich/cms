<div class="cr">

    <div class="footer-container">
        <div class="footer-left">
            <div class="title-footer">
                Контакты
            </div>
            <div class="footer-item addres">
                {!! $lang == 'kz' ? $contact->address_kz : $contact->address_ru !!}
            </div>
            <div class="footer-item phone">
                {{ $contact->phone }}
            </div>
            <div class="footer-item instagramm">
                {{ $contact->insta }}
            </div>
            <div class="footer-item rezhim">
                {{ $contact->mail_link }}
            </div>
        </div>
        <div class="footer-map">
            <div id='map' data-lng="{{ $ar_coor['lng'] }}" data-lat="{{ $ar_coor['lat'] }}" style=" height: 250px;
                                                                                                width: 100%;
                                                                                            "></div>
    </div>
</div>
</div>
