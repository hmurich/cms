<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use App\Model\ModelGen;
use App\Model\ModelGenAttr;
use App\Model\SysGenAttrType;

class ModelGenController extends Controller{
    function getIndex(Request $request){
        $items = ModelGen::where('id', '>', 0);

        $ar = array();
        $ar['title'] = 'Генератор моделей';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);

        $ar['ar_model'] = ModelGen::pluck('name', 'id')->toArray();

        return view('admin.model_gen.index', $ar);
    }

    function getUpdate(Request $request, $id){
        $item = ModelGen::findOrFail($id);

        $ar = array();
        $ar['title'] = 'Изменение модели';
        $ar['action'] = action('Admin\ModelGenController@postUpdate', $item->id);
        $ar['item'] = $item;
        $ar['item_attr'] = ModelGenAttr::where('model_id', $item->id)->get();

        $ar['ar_model'] = ModelGen::where('id', '<>', $id)->pluck('name', 'sys_name')->toArray();
        $ar['ar_type'] = SysGenAttrType::pluck('name', 'sys_name')->toArray();
        $ar['ar_attr'] = ModelGenAttr::get();

        return view('admin.model_gen.update', $ar);
    }

    function postUpdate(Request $request, $id){
        $item = ModelGen::findOrFail($id);
        //dd($request->all());

        $ar_type = SysGenAttrType::pluck('sys_name')->toArray();
        $table_name = $item->sys_name;

        DB::beginTransaction();

        $data = $request->all();
        if (isset($data['attr_type_key']) && count($data['attr_type_key']) > 0) {
            foreach ($data['attr_type_key'] as $k=>$v) {
                if (!in_array($v, $ar_type))
                    continue;

                $attr = new ModelGenAttr();
                $attr->model_id = $item->id;
                $attr->model_sys_name = $item->sys_name;

                $attr->attr_type_key = $data['attr_type_key'][$k];
                $attr->attr_title = $data['attr_title'][$k];
                $attr->attr_name = $data['attr_name'][$k];

                if ($attr->attr_type_key == 'relation'){
                    $attr->attr_rel_table = $data['attr_rel_table'][$k];
                    $attr->attr_rel_title = $data['attr_rel_title'][$k];
                }
                else {
                    $attr->attr_rel_table = null;
                    $attr->attr_rel_title = null;
                }

                $attr->save();

                Schema::table($table_name, function (Blueprint $table) use ($attr, $item) {
                    switch ($attr->attr_type_key) {
                        case 'string':
                            $table->string($attr->attr_name)->nullable();
                            break;
                        case 'int':
                            $table->integer($attr->attr_name)->nullable();
                            break;
                        case 'bool':
                            $table->unsignedTinyInteger($attr->attr_name)->default(0);
                            break;
                        case 'short_text':
                            $table->text($attr->attr_name)->nullable();
                            break;
                        case 'text':
                            $table->longText($attr->attr_name)->nullable();
                            break;
                        case 'date':
                            $table->date($attr->attr_name)->nullable();
                            break;
                        case 'file':
                            $table->string($attr->attr_name)->nullable();
                            break;
                        case 'img':
                            $table->string($attr->attr_name)->nullable();
                            break;
                        case 'coor':
                            $table->text($attr->attr_name)->nullable();
                            break;
                        case 'relation':
                            $table->integer($attr->attr_name)->nullable();

                            $item->has_rel = 1;
                            $item->save();

                            break;
                    }


                });
            }

        }

        if (isset($data['ar_del_attr']) && count($data['ar_del_attr']) > 0) {
            $ar_del_attr = ModelGenAttr::where('model_id', $item->id)->whereIn('id', $data['ar_del_attr'])->get();
            foreach($ar_del_attr as $attr_del){
                Schema::table($table_name, function (Blueprint $table) use ($attr_del) {
                    $table->dropColumn($attr_del->attr_name);
                });

                $attr_del->delete();
            }
        }

        DB::commit();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getItem(Request $request, $id = 0){
        $item = ModelGen::find($id);

        $ar = array();
        $ar['title'] = 'Добавление модели';
        $ar['action'] = action('Admin\ModelGenController@postItem');

        $ar['ar_model'] = ModelGen::where('id', '<>', $id)->pluck('name', 'sys_name')->toArray();
        $ar['ar_type'] = SysGenAttrType::pluck('name', 'sys_name')->toArray();
        $ar['ar_attr'] = ModelGenAttr::get();

        return view('admin.model_gen.item', $ar);
    }

    function postItem(Request $request, $id = 0){
        //dd($request->all());

        $ar_type = SysGenAttrType::pluck('sys_name')->toArray();

        DB::beginTransaction();

        if (ModelGen::where('sys_name', $request->input('sys_name'))->where('id', '<>', $id)->count() > 0)
            return redirect()->back()->with('error', 'Указанное значение системного кода уже есть');

        if (Schema::hasTable($request->input('sys_name')))
            return redirect()->back()->with('error', 'Указанное значение системного кода уже есть');

        $item = new ModelGen();
        $item->sys_name         = $request->input('sys_name');
        $item->sys_model_name   = $request->input('sys_model_name');
        $item->name             = $request->input('name');
        $item->sort_num         = $request->input('sort_num');
        $item->is_many          = $request->input('is_many');
        $item->is_crud	        = $request->input('is_crud');
        $item->save();

        $table_name = $request->input('sys_name');
        Schema::create($table_name, function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        $data = $request->all();
        foreach ($data['attr_type_key'] as $k=>$v) {
            if (!in_array($v, $ar_type))
                continue;

            $attr = new ModelGenAttr();
            $attr->model_id = $item->id;
            $attr->model_sys_name = $item->sys_name;

            $attr->attr_type_key = $data['attr_type_key'][$k];
            $attr->attr_title = $data['attr_title'][$k];
            $attr->attr_name = $data['attr_name'][$k];

            if ($attr->attr_type_key == 'relation'){
                $attr->attr_rel_table = $data['attr_rel_table'][$k];
                $attr->attr_rel_title = $data['attr_rel_title'][$k];
            }
            else {
                $attr->attr_rel_table = null;
                $attr->attr_rel_title = null;
            }

            $attr->save();

            Schema::table($table_name, function (Blueprint $table) use ($attr, $item) {
                switch ($attr->attr_type_key) {
                    case 'string':
                        $table->string($attr->attr_name)->nullable();
                        break;
                    case 'int':
                        $table->integer($attr->attr_name)->nullable();
                        break;
                    case 'bool':
                        $table->unsignedTinyInteger($attr->attr_name)->default(0);
                        break;
                    case 'short_text':
                        $table->text($attr->attr_name)->nullable();
                        break;
                    case 'text':
                        $table->longText($attr->attr_name)->nullable();
                        break;
                    case 'date':
                        $table->date($attr->attr_name)->nullable();
                        break;
                    case 'file':
                        $table->string($attr->attr_name)->nullable();
                        break;
                    case 'img':
                        $table->string($attr->attr_name)->nullable();
                        break;
                    case 'coor':
                        $table->text($attr->attr_name)->nullable();
                        break;
                    case 'relation':
                        $table->integer($attr->attr_name)->nullable();

                        $item->has_rel = 1;
                        $item->save();

                        break;
                }


            });
        }

        DB::commit();

        $this->generateModel($table_name, $item->sys_model_name);

        return redirect()->action('Admin\ModelGenController@getIndex')->with('success', 'Сохранено');
    }

    protected function generateModel($table_name, $model_name){
        $exitCode = \Artisan::call('make:model', [
                'name' => 'Model/Gen/'.$model_name, '--table' => $table_name
        ]);
    }

    function getDelete($id){
        DB::beginTransaction();

        $item = ModelGen::findOrFail($id);

        if (Schema::hasTable($item->sys_name))
            Schema::drop($item->sys_name);

        if (file_exists(app_path().'/Model/Gen/'.$item->sys_model_name.'.php'))
            unlink(app_path().'/Model/Gen/'.$item->sys_model_name.'.php');

        $item->delete();

        DB::commit();

        return redirect()->back()->with('success', 'Удалено');
    }
}
