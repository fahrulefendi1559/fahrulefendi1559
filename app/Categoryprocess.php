<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoryprocess extends Model
{
    protected $table= 'category_process';
    protected $fillable= ['id','category_process'];

    public function process()
    {
        return $this->hasMany('App\Proses');
    }
}
