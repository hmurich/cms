<?php namespace App\Model\Gen;

use Illuminate\Database\Eloquent\Model;

class Service extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [];


    function relImg(){
        return $this->hasMany('App\Model\Gen\ServiceImg', 'service_id');
    }
}
