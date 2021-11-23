<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_agenda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agenda_id');
            $table->unsignedBigInteger('pekerja_id');
            $table->unsignedBigInteger('persediaan_id');
            $table->integer('jumlah_barang');
            $table->timestamps();

            $table->foreign('agenda_id')->references('id')->on('agenda');
            $table->foreign('pekerja_id')->references('id')->on('pekerja');
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
        Schema::dropIfExists('detail_agenda');
    }
}
