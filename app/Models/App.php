<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'app';

    protected $fillable = [
        'name'
    ];

    public function country(){
        return $this->hasOne('App\Models\Country','id','country_id');
      }
}
