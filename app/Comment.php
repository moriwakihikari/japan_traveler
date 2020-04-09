<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment_honbun',
        ];
        
        public function toukou()
        {
            return $this->belongsTo('app\Toukou');
        }
}
