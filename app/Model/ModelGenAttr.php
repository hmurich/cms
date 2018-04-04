<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ModelGenAttr extends Model{
    protected $table = 'model_gen_attr';

    function relGen(){
        return $this->belongsTo('App\Model\ModelGen', 'model_id');
    }
}
