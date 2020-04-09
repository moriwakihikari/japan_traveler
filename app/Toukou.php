<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toukou extends Model
{
    protected $fillable = [
        'toukou_title',
        'toukou_honbun'
        ];
        
        /*public function comments()
        {
            return $this->hasMany('App\Comment');
        }*/
}
