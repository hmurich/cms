<div class="form-group">
    <label for="" >{{ $title }}:</label>  {!! $item && $item->$name ? '<a href="/'.$item->$name.'" target="_blank">Просмотреть</a>' : null !!}
    <input type="file" name="{{ $name }}">
</div>
