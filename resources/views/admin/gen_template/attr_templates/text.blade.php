<div class="form-group">
    <label for="" >{{ $title }}:</label>
    <textarea class="form-control wysihtml5" rows="3" name="{{ $name }}">{{ $item ? $item->$name : null }}</textarea>
</div>
