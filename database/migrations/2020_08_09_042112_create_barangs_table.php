<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id('id_barang');
            $table->char('nama_barang', 150);
            $table->char('kode_barang', 100);
            $table->char('jenis_barang', 100);
            $table->char('merek_barang', 100);
            $table->bigInteger('harga_modal');
            $table->float('harga_jual2');
            $table->float('harga_jual1');
            $table->bigInteger('stok_barang');
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
        Schema::dropIfExists('barangs');
    }
}
