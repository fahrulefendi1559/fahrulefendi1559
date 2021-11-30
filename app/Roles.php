<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table= 'roles';
    protected $fillable= ['id','namarole'];

    public function permintaan()
    {
        return $this->hasMany('App\Permintaan');
    }
}
