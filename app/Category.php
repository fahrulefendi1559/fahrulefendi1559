<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table= 'category';
    protected $fillable= ['id','category'];

    public function Permintaan()
    {
        return $this->hasMany(Permintaan::class);
    }
}
