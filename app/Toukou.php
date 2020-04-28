<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toukou extends Model
{
    protected $guarded = array('id');
    
    protected $primaryKey = 'toukou_id';
    
    public static $rules = array(
        'toukou_title' => 'required',
        'toukou_honbun' => 'required',
        );
        
        protected $fillable = [ //複数代入を許可？
            'toukou_honbun',
            ];
        
        public function thread()
        {
            return $this->belongsTo('App\Thread');
        }
}
