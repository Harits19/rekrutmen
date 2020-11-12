<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftar3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar', function (Blueprint $table) {
                $table->id();
                $table->foreignId('rekrutmen_id');
                $table->string('nama');
                $table->string('no_hp');
                $table->string('email');
                $table->json('data_formulir');
                $table->enum('status', ['-','proses konfirmasi', 'hadir']);
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
        Schema::dropIfExists('pendaftar');
    }
}
