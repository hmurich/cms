@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="row">
    <form action='{{ $action }}' method='post' enctype="multipart/form-data" >
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
                <div class="box-body">
                    @foreach ($gen_attrs as $g)
                        @include('admin.gen_template.attr_templates.'.$g->attr_type_key, ['name'=>$g->attr_name, 'title'=>$g->attr_title, 'item'=>$item, 'attr'=>$g])
                    @endforeach
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Сохранить</button>
                </div>
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@endsection
