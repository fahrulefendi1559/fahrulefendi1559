<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table= 'division';
    protected $fillable= ['id','department_id','divisi'];

    public function Users()
    {
        return $this->hasMany(Permintaan::class);
    }

    public function Department()
    {
        return $this->belongsTo(Department::class);
    }
}
