<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    protected $table= 'process';
    protected $fillable= ['id','request_id', 'category_process', 'note'];

    public function category_process()
    {
        return $this->belongsTo('App\Categoryprocess','category_process','id');
    }

    public function process()
    {
        return $this->hasMany('App\Permintaan');
    }
}
