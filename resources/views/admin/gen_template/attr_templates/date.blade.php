<div class="form-group">
    <label for="" >{{ $title }}:</label>
    <input type="date" class="form-control" id='' name="{{ $name }}" value="{{ $item ? $item->$name : null }}" >
</div>
