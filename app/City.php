<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = array('id');
    
    protected $primaryKey = 'city_id';
}
