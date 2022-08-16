<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwitansis', function (Blueprint $table) {
            $table->id();
            $table->text('uraian_pembayaran');
            $table->integer('uang');
            $table->unsignedBigInteger('kadis_id');
            $table->foreign('kadis_id')->references('id')->on('pejabats');
            $table->unsignedBigInteger('pa_pptk_id');
            $table->foreign('pa_pptk_id')->references('id')->on('pejabats');
            $table->unsignedBigInteger('bendahara_id');
            $table->foreign('bendahara_id')->references('id')->on('pejabats');
            $table->foreignId('belanja_id');
            $table->foreignId('subkegiatan_id');
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
        Schema::dropIfExists('kwitansis');
    }
};
