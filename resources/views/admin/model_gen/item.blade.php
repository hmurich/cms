@extends('admin.layout')

@section('title', $title)

@section('content')
<form action='{{ $action }}' method='post'>
    <div class="row">
        <div class='col-md-6'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
                <div class="box-body">
                    @if (!isset($item))
                        <div class="form-group">
                            <label for="sys_name" >Название таблицы:</label>
                            <input type="text" class="form-control" name='sys_name' placeholder="sys_name"  required="">
                        </div>
                        <div class="form-group">
                            <label for="sys_model_name" >Название модели:</label>
                            <input type="text" class="form-control" name='sys_model_name' placeholder="sys_model_name"  required="">
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name" >Наименование:</label>
                        <input type="text" class="form-control" name='name' placeholder="Название"   required="">
                    </div>

                    <div class="form-group">
                        <label for="sort_num" >Сортировочный номер:</label>
                        <input type="number" class="form-control" name='sort_num'    required="">
                    </div>
                    <div class="form-group">
                        <label for="name" >Множенственный:</label>
                        <select class="form-control " style="width: 100%;" name='is_many'>
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" >Полный список:</label>
                        <select class="form-control " style="width: 100%;" name='is_crud'>
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Форма добавления полей модели</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="cat_id" >Тип поля:</label>
                        <select class="form-control select2" style="width: 100%;" id='attr_type_key'>
                            @foreach ($ar_type as $id=>$name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group js_rel_option">
                        <label for="attr_title" >Таблица отношения:</label>
                        <select class="form-control " style="width: 100%;" id='attr_rel_table'>
                            @foreach ($ar_model as $id=>$name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group js_rel_option" >
                        <label for="attr_title" >Заголовок таблицы отношения:</label>
                        <select class="form-control " style="width: 100%;" id='attr_rel_title'>
                            @foreach ($ar_attr as $el)
                                <option value="{{ $el->attr_name }}" class="model_{{ $el->model_sys_name }}">{{ $el->attr_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="attr_title" >Заголовок поля:</label>
                        <input type="text" class="form-control" id='attr_title'  >
                    </div>
                    <div class="form-group">
                        <label for="attr_name" >Наименование поля:</label>
                        <input type="text" class="form-control" id='attr_name'  >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="button" id='js_add_new_column' class="btn btn-info pull-right">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Поля модели</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Тип поля</th>
                                <th>Таблица отношения</th>
                                <th>Заголовок таблицы отношения</th>
                                <th>Заголовок поля</th>
                                <th>Наименование поля</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="js_list_column">

                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@endsection

@section('js_block')
    <script src="/admin/my/model_gen.js"></script>
@endsection
