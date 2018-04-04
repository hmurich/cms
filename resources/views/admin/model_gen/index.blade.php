@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
        <div class="box-body">
        	<table class="table table-striped">
                <tr>
        	        <th>id</th>
                    <th>Название таблицы</th>
                    <th>Название модели</th>
                    <th>Наименование</th>
                    <th>Множенственный</th>
                    <th>Создан</th>
        	        <th>
                        <a href='{{ action("Admin\ModelGenController@getItem") }}'>
                            <i class="glyphicon glyphicon-plus"></i>
                        </a>
                    </th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
                        <td>{{ $i->sys_name }}</td>
                        <td>{{ $i->sys_model_name }}</td>
            	        <td>{{ $i->name }}</td>
                        <td>{{ $i->is_many ? 'много' : 'один' }}</td>
                        <td>{{ $i->created_at }}</td>
            	        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Действие</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ action("Admin\ModelGenController@getUpdate", $i->id) }}" >
                                            Изменить
                        				</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ action("Admin\ModelGenController@getDelete", $i->id) }}" >
                                            Удалить
                        				</a>
                                    </li>
                                </ul>
                            </div>
            			</td>
            	    </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer clearfix">
        	{!! $items->render() !!}
        </div>
    </div>
</div>

@endsection
