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
use App\Model\GenModelTemplate;

class GenChildTemplateController extends Controller{
    function getIndex(Request $request, $model_gen_id, $parent_gen_id){
        $gen = ModelGen::findOrFail($model_gen_id);
        $gen_attrs = ModelGenAttr::where('model_id', $gen->id)->orderBy('id', 'asc')->get();

        $class_name  = 'App\Model\Gen\\'.$gen->sys_model_name;
        $items = $class_name::where('id', '>', 0);

        $ar = array();
        $ar['title'] = $gen->name;
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);
        $ar['gen_attrs'] = $gen_attrs;
        $ar['gen'] = $gen;
        $ar['parent_gen_id'] = $parent_gen_id;

        return view('admin.gen_child_template.index', $ar);
    }

    function getItem(Request $request, $model_gen_id, $parent_gen_id, $id = 0){
        $gen = ModelGen::findOrFail($model_gen_id);
        $gen_attrs = ModelGenAttr::where('model_id', $gen->id)->orderBy('sort_num', 'asc')->get();

        $class_name  = 'App\Model\Gen\\'.$gen->sys_model_name;
        $item = $class_name::find($id);

        $ar = array();
        if (!$item){
            $ar['title'] = 'Добавление ';
            $ar['action'] = action('Admin\GenChildTemplateController@postItem', [$gen->id, $parent_gen_id]);
            $ar['item'] = false;
        }
        else {
            $ar['title'] = 'Изменение';
            $ar['action'] = action('Admin\GenChildTemplateController@postItem', [$gen->id, $parent_gen_id, $item->id]);
            $ar['item'] = $item;
        }

        $ar['gen_attrs'] = $gen_attrs;
        $ar['gen'] = $gen;

        $ar['parent_gen_id'] = $parent_gen_id;

        return view('admin.gen_template.item', $ar);
    }

    function postItem(Request $request, $model_gen_id, $parent_gen_id, $id = 0){
        $gen = ModelGen::findOrFail($model_gen_id);
        $gen_attrs = ModelGenAttr::where('model_id', $gen->id)->orderBy('id', 'desc')->get();

        $class_name  = 'App\Model\Gen\\'.$gen->sys_model_name;
        $item = $class_name::find($id);
        if (!$item)
            $item = new $class_name();

        foreach ($gen_attrs as $g) {
            $col_name = $g->attr_name;
            switch ($g->attr_type_key) {
                case 'string':
                    $item->$col_name = $request->get($col_name);
                    break;
                case 'int':
                    $item->$col_name = $request->get($col_name);
                    break;
                case 'bool':
                    $item->$col_name = $request->get($col_name);
                    break;
                case 'short_text':
                    $item->$col_name = $request->get($col_name);
                    break;
                case 'text':
                    $item->$col_name = $request->get($col_name);
                    break;
                case 'date':
                    $item->$col_name = $request->get($col_name);
                    break;
                case 'file':
                    if ($request->hasFile($col_name)){
                        $file_name =  time().rand(0,9).'.'.$request->$col_name->getClientOriginalExtension();
                        $item->$col_name = $request->$col_name->storeAs('store/'.date('Y').'/'.date('m').'/'.date('d'), $file_name);
                    }
                    break;
                case 'img':
                    if ($request->hasFile($col_name)){
                        $file_name =  time().rand(0,9).'.'.$request->$col_name->getClientOriginalExtension();
                        $item->$col_name = $request->$col_name->storeAs('store/'.date('Y').'/'.date('m').'/'.date('d'), $file_name);
                    }
                    break;
                case 'coor':
                    $item->$col_name = json_encode($request->get($col_name));
                    break;
                case 'relation':
                    $item->$col_name = $request->get($col_name);
                    break;
            }
        }

        $item->save();

        return redirect()->action('Admin\GenChildTemplateController@getIndex', [$gen->id, $parent_gen_id])->with('success', 'Сохранено');
    }


    function getDelete(Request $request, $model_gen_id, $id){
        $gen = ModelGen::findOrFail($model_gen_id);
        $gen_attrs = ModelGenAttr::where('model_id', $gen->id)->orderBy('id', 'desc')->get();

        $class_name  = 'App\Model\Gen\\'.$gen->sys_model_name;
        $item = $class_name::findOrFail($id);
        $item->delete();

        DB::commit();

        return redirect()->back()->with('success', 'Удалено');
    }
}
