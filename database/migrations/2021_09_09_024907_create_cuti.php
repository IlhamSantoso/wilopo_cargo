<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->date('tgl_pengajuan');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->integer('lama_hari');
            $table->string('keterangan', 100);
            $table->string('status', 1)->default('P');
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
        Schema::dropIfExists('cutis');
    }
}
