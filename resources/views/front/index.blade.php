<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta name="keyword" content="">
    <meta name="description" content="">
    <meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
    <link href="/front/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="/front/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/front/css/slide.min.css">
    <link href="/front/css/animate.css" rel="stylesheet" type="text/css?ver=2.7.8">
    <link rel="stylesheet" href="/front/css/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/front/css/animate.css">
</head>
<body class="main main-home ">
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('success') }}
        </div>
    @endif
	<div class="page">
		<header class="header">
            @include('front.__include.header')
		</header>
		<div class="container">
			<div class="video-bg">
                @include('front.__include.video-bg')
		 	</div>
		 	<div class="about" id="about">
                @include('front.__include.about')
		 	</div>
		 	<div class="service" id="service">
                @include('front.__include.service')
            </div>
		 	<div class="portfolio" id="portfolio">
                @include('front.__include.portfolio')
            </div>
		 	<div class="how-we-work">
                @include('front.__include.how-we-work')
            </div>
		 	<div class="cifra-container" id="bar-1">
                @include('front.__include.cifra-container')
            </div>
		 	<div class="team-container" id="team">
                @include('front.__include.team')
		 	</div>
		 	<div class="akcia" id="akcii">
                @include('front.__include.akcia')
		 	</div>
		</div>
	</div>
	<footer class="footer" id="contact">
        @include('front.__include.contact')
	</footer>
    @include('front.__include.modal1')

    <script type="text/javascript" src="/front/js/jquery.js"></script>

    <script type="text/javascript">
       $(document).ready(function(){
                $('#btn_submit').click(function(){
                    // собираем данные с формы
                    var user_name    = $('#user_name').val();
                    var user_email   = $('#user_email').val();
                    // отправляем данные
                    $.ajax({
                        url: "send.php", // куда отправляем
                        type: "post", // метод передачи
                        dataType: "json", // тип передачи данных
                        data: { // что отправляем
                            "user_name":    user_name,
                            "user_email":   user_email,
                        },
                        // после получения ответа сервера
                        success: function(data){
                            $('.messages').html(data.result); // выводим ответ сервера
                        }
                    });
                });
            });
    </script>
    <script src="/front/js/jquery.fancybox.js" type="text/javascript"></script>
    <script src="/front/js/test.js" type="text/javascript"></script>
    <script src="/front/js/cifra.js"></script>
    <script src="/front/js/app.js" type="text/javascript"></script>
    <script src="/front/js/tab.js" type="text/javascript"></script>
    <script src="/front/js/wow.min.js" type="text/javascript"></script>
    <script src="/front/js/jQuery-plugin-progressbar.js"></script>
    <script src="/front/js/ion.rangeSlider.js"></script>



    <script>
        new WOW().init();
    </script>
    <script type="text/javascript" src="//api-maps.yandex.ru/2.0/?load=package.standard&amp;lang=ru-RU" ></script>
      <script>
        var myMap;
        ymaps.ready(init);

        function init(){
            lng = jQuery("#map").data('lng');
            lat = jQuery("#map").data('lat');

            var center = [];
            center.push(lng);
            center.push(lat);

            myMap = new ymaps.Map("map",{
                center: center,
                zoom: 13,
                behaviors: ["default", "scrollZoom"]
            },
            {
                balloonMaxWidth: 300
            });

            myPlacemark = new ymaps.Placemark([lng, lat]);
            myMap.geoObjects.add(myPlacemark);

            myMap.controls.add("zoomControl");
            myMap.controls.add("mapTools");
            myMap.controls.add("typeSelector");
        }
    </script>

</body>
</html>
