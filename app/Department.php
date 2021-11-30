<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table= 'department';
    protected $fillable= ['id','department'];

    public function Division()
    {
        return $this->hasMany(Division::class);
    }
}
