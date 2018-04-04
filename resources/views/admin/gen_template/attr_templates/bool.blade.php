<div class="form-group">
    <label for="" >{{ $title }}:</label>
    <select class="form-control " style="width: 100%;" name="{{ $name }}">
        <option value="0" {{ $item && $item->$name == 0 ? 'selected' : null }}>Нет</option>
        <option value="1" {{ $item && $item->$name == 1 ? 'selected' : null }}>Да</option>
    </select>
</div>
