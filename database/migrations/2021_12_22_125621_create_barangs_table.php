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
            $table->id();
            $table->string('nama_barang');
            $table->bigInteger('kode_satuan')->unsigned();
            $table->foreign('kode_satuan')->references('id')->on('sabars');
            $table->bigInteger('kategori_barang')->unsigned();
            $table->foreign('kategori_barang')->references('id')->on('kabars');
            $table->decimal('harga_beli', 10, 2);
            $table->decimal('harga_jual', 10, 2);
            $table->date('exp_date')->nullable();
            $table->text('note')->nullable();
            $table->index('exp_date');
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
