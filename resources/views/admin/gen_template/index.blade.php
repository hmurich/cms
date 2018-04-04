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
                    @foreach ($gen_attrs as $attr)
                        @if (!in_array($attr->attr_type_key, ['string', 'int', 'bool', 'file', 'img']))
                            <?php continue; ?>
                        @endif
                        <th>{{ $attr->attr_title }}</th>
                    @endforeach
                    <th>Создан</th>
        	        <th>
                        @if ($gen->is_crud)
                            <a href='{{ action("Admin\GenTemplateController@getItem", $gen->id) }}'>
                                <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        @endif
                    </th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
                        @foreach ($gen_attrs as $attr)
                            @if (!in_array($attr->attr_type_key, ['string', 'int', 'bool', 'file', 'img']))
                                <?php continue; ?>
                            @endif
                            @if ($attr->attr_type_key == 'bool')
                                <td>{{ $i->{$attr->attr_name} ? 'да' : 'нет'}}</td>
                            @elseif ($attr->attr_type_key == 'file')
                                <td><a href="/{{ $i->{$attr->attr_name} }}" target="_blank">Просмотреть</a></td>
                            @elseif ($attr->attr_type_key == 'img')
                                <td>
                                    <img src="/{{ $i->{$attr->attr_name} }}"
                                            class="img-responsive img-thumbnail"
                                            style="max-width: 150px;max-height: 100px;"/>
                                </td>
                            @else
                                <td>{{ $i->{$attr->attr_name} }}</td>
                            @endif
                        @endforeach
                        <td>{{ $i->created_at }}</td>
            	        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Действие</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach (App\Model\ModelGenAttr::where('attr_rel_table', $gen->sys_name)->get() as $g)
                                        <li>
                                            <a href="{{ action("Admin\GenChildTemplateController@getIndex", [$g->model_id, $i->id]) }}" >
                                                {{ $g->relGen->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                    @if ($gen->is_crud)
                                        <li>
                                            <a href="{{ action("Admin\GenTemplateController@getItem", [$gen->id, $i->id]) }}" >
                                                Изменить
                            				</a>
                                        </li>
                                        <li class="divider"></li>
                                    @endif
                                    <li>
                                        <a href="{{ action("Admin\GenTemplateController@getDelete", [$gen->id, $i->id]) }}" >
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
