<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_transaksis', function (Blueprint $table) {
            $table->id('id_recordtransaksi');
            $table->integer('id_transaksi');
            $table->integer('id_barang');
            $table->integer('jumlah_barang');
            $table->integer('total_harga');
            $table->integer('nomor_nota');
            $table->date('tanggal_transaksi');
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
        Schema::dropIfExists('record_transaksis');
    }
}
