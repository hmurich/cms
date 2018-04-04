
<div id="modal1" class="modal_div registar-zav" >
    <span class="modal_close"></span>
    <div class="modal-title">Оставить заявку</div>
    <form id="form" method="post" action="{{ action('Front\IndexController@postIndex') }}">
        <div class="form-modal">
            <div class="messages"></div>
            <div class="modal-input__container ">
                <input type="text" id="user_name" name="name" required="required" placeholder="Имя:" class="modal-input ">
            </div>
            <div class="modal-input__container ">
                <input type="text" id="user_email" name="phone" required="required" placeholder="Номер телефона: " class="modal-input ">
            </div>
        </div>
        <div class="modal-button-container">
            <input type="submit" value="Отправить " class="modal-button button yellow " id="btn_submit">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
<div id="overlay" class="" data-banner-id="4"></div>
