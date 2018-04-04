@if (isset($parent_gen_id))
    <input type="hidden" name="{{ $name }}" value="{{ $parent_gen_id }}">
@else
    <?php
        $rel_model = App\Model\ModelGen::where('sys_name', $attr->attr_rel_table)->first();
        $rel_model = 'App\Model\Gen\\'.$rel_model->sys_model_name;
        $ar_rel = $rel_model::pluck($attr->attr_rel_title, 'id')->toArray();
    ?>

    <div class="form-group">
        <label >{{ $title }}</label>
        <select class="form-control" name="{{ $name }}"  required>
            @foreach ($ar_rel as $k=>$v)
                <option value="{{ $k }}"  {{ $item && $item->$name == $k ? 'selected' : null }}>{{ $v }}</option>
            @endforeach
        </select>
    </div>
@endif
