<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistik', function (Blueprint $table) {
            $table->id();
            $table->string('pengirim');
            $table->string('alamatpengirim');
            $table->string('barang');
            $table->string('jumlahbarang');
            $table->string('penerima');
            $table->string('alamatpenerima');
            $table->softDeletes();
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
        Schema::dropIfExists('logistik');
    }
}
