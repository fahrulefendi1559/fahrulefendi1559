<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProcess extends Model
{
    protected $table= 'order_process';
    protected $fillable= ['id','request_id', 'status', 'info'];
}
