<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = array('thread_id');//解決　必要：エラー文　Add [thread_title] to fillable property to allow mass assignment on
    
    protected $primaryKey = 'thread_id';
    
    public static $rules = array(//一個でvalidationの掛け方分からずauthor_id追加 
        'thread_title' => 'required',
        );
        
        public function toukou()
        {
            return $this->hasMany('App\Toukou');
        }
}
