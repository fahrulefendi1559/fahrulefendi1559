<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $table= 'request';
    protected $fillable= ['id','user_id','user_create', 'category_id', 'product_name', 'spec', 'qty', 'unit', 'desc','status','approval'];
    protected $dates = ['use_date'];

    public function roles()
    {
        return $this->belongsTo('App\Roles','user_create','id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsTo('App\Users','user_id','id');
    }

    public function process()
    {
        return $this->belongsTo('App\Proses','process_id','id');
    }

}
