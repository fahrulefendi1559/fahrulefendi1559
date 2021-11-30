<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table= 'users';
    protected $fillable= ['id','nik','name','username','email','role_user','divisi_id','status'];

    public function Permintaan()
    {
        return $this->hasMany(Permintaan::class);
    }

    public function Roles()
    {
        return $this->belongsTo(Roles::class);
    }

    public function Division()
    {
        return $this->belongsTo('App\Division','divisi_id','id');
    }
}
