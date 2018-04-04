<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class GenModelTemplate extends Model{
    protected $table = 'model_gen';


    function changeTable($table){
        $this->table = $table;
    }

}
