<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GenCMS | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/bootstrap/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/plugins/select2/select2.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/dist/css/AdminLTE.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/dist/css/skins/_all-skins.min.css') }}" >
    @section('css_block')

    @show
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            @include('admin.include.header')
        </header>

        <aside class="main-sidebar">
            @include('admin.include.sidebar')
        </aside>

        <div class="content-wrapper">
            <section class="content">
                @include('admin.include.message')

                @yield('content')
            </section>
        </div>

        <footer class="main-footer">
            @include('admin.include.footer')
        </footer>
    </div>

    <script type="text/javascript" src="{{ URL::asset('//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/jQuery/jquery-2.2.3.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/select2/select2.full.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/fastclick/fastclick.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" ></script>
    <!-- InputMask -->
    <script src="{{ URL::asset('admin/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ URL::asset('admin/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ URL::asset('admin/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script src="{{ URL::asset('admin/plugins/input-mask/jquery.inputmask.numeric.extensions.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('admin/dist/js/app.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/dist/js/demo.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/my/common.js') }}" ></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
            $(".wysihtml5").wysihtml5();
            $("[data-mask]").inputmask();
        });
    </script>
    @section('js_block')

    @show
</body>
</html>
