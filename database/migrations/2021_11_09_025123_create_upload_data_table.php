<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pr');
            $table->string('tgl_po');
            $table->string('po');
            $table->string('nama_barang');
            $table->string('jumlah');
            $table->string('satuan');
            $table->string('harga');
            $table->string('total_harga');
            $table->string('vendor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_data');
    }
}
