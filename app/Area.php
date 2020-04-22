<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = array('id');
    
    protected $primaryKey = 'area_id';
}
