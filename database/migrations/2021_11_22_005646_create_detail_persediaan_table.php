<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPersediaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_persediaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persediaan_id');
            $table->integer('jumlah_awal')->nullable();
            $table->integer('jumlah_akhir')->nullable();
            $table->timestamps();

            $table->foreign('persediaan_id')->references('id')->on('persediaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_persediaan');
    }
}
