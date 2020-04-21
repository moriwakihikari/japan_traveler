<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = array('id');//解決　必要：エラー文　Add [thread_title] to fillable property to allow mass assignment on 
    
    public static $rules = array(//一個でvalidationの掛け方分からずauthor_id追加 
        'thread_title' => 'required',
        );
}
