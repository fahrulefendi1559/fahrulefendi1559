<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadPRPO extends Model
{
    protected $table= 'upload_data';
    protected $fillable= ['id','pr','tgl_po','po','nama_barang','jumlah','satuan','harga','total_harga','vendor','file'];
}
