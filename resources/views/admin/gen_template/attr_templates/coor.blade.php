<?php
    $ar_coord = ['lat'=>null, 'lng'=>null];
    if ($item)
        $ar_coord = (array)json_decode($item->$name, true);
?>
<div class="form-group">
    <div class="form-group">
        <label for="lng" >Широта:</label>
        <input type="text" class="form-control" name='{{ $name }}[lng]' id='lng' placeholder="Для выбора значения нужно выбрать точку на карте"  required="" readonly value="{{ $ar_coord['lng'] }}">
    </div>
    <div class="form-group">
        <label for="lat" >Долгота:</label>
        <input type="text" class="form-control" name='{{ $name }}[lat]' id='lat' placeholder="Для выбора значения нужно выбрать точку на карте"  required="" readonly value="{{ $ar_coord['lat'] }}">
    </div>
    <div class="form-group">
        <div id='map' style="width: 100%; height: 300px;"></div>
    </div>
</div>


@section('js_block')
    @parent
    <script type="text/javascript" src="//api-maps.yandex.ru/2.0/?load=package.standard&amp;lang=ru-RU" ></script>
    <script src="/admin/my/map.js"></script>
@endsection
