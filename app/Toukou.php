<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toukou extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'toukou_title' => 'required',
        'toukou_honbun' => 'required',
        );
        
        /*public function comments()
        {
            return $this->hasMany('App\Comment');
        }*/
}
