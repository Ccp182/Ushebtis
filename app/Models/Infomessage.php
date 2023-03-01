<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Infomessage
 *
 * @property $id
 * @property $title
 * @property $body
 * @property $start_time
 * @property $end_time
 * @property $country
 * @property $app
 * @property $created_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Infomessage extends Model
{
    
    static $rules = [
		'title' => 'required',
		'body' => 'required',
    'start_time' => 'required',
		'end_time' => 'required',
    'type_id' => 'required',
		'app_id' => 'required',
    'country_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','body','start_time','end_time','type_id','app_id','country_id'];

    public function type(){
      return $this->hasOne('App\Models\TypeMessage','id','type_id');
    }

    public function app(){
      return $this->hasOne('App\Models\App','id','app_id');
    }

    public function country(){
      return $this->hasOne('App\Models\Country','id','country_id');
    }

}
