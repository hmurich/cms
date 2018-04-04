<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model{
    protected $table = 'site_settings';
    public $timestamps = false;

    static function getNameByKey($key){

       $el = SiteSetting::where('key', $key)->first();
       if (!$el){
           $el = new SiteSetting();
           $el->key = $key;
           $el->save();
       }

       return $el->name;
    }

    static function getKeyAr(){
       return array_keys(static::getKeyArName());
    }

    static function getKeyArName(){
       return array(
           'social_insta'       => 'Ссылка на инстаграм',
           'social_vk'          => 'Ссылка на ВК',
           'main_email'         => 'Email (для взодящих сообщений)',
           'num_1'              => 'ДОКУМЕНТАЛЬНЫЙ ФИЛЬМ (Количество)',
           'num_2'              => 'СОЦИАЛЬНЫЕ ПРОЕКТЫ (Количество)',
           'num_3'              => 'ТЕЛЕВИЗИОННЫЕ ПРОЕКТЫ (Количество)',
           'num_4'              => 'РЕКЛАМНЫЕ РОЛИКИ (Количество)'
       );
    }
}
