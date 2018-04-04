<?php namespace App\Model\Gen;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sales';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [];

}
