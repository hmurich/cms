<div class="form-group">
    <label for="" >{{ $title }}:</label>
    <textarea class="form-control" rows="3" name="{{ $name }}">{{ $item ? $item->$name : null }}</textarea>
</div>
