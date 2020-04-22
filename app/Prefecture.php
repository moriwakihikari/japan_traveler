<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $guarded = array('id');
    
    protected $primaryKey = 'prefecture_id';
/*
    protected $primaryKey = 'prefecture_id';
    protected $fillable = ['prefecture_name', 'display_order'];
    protected $dates = ['created_at', 'update_at'];
    
    
    public function getPrefectureList(int $num_pre_page = 0, string $order = 'display_order', string $direction ='asc')
    {
        $query = $this->orderBy($order, $direction);
        if ($num_pre_page) {
            return $query->paginate($num_pre_page);
        }
        return $query->get();
    }
    
    public function blogs()
    {
        return $this->hasMany('App\Blog', 'prefecture_id', 'prefecture_id');
    }*/
}
