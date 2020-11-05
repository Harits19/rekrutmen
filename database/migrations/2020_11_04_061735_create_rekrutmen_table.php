<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekrutmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekrutmen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organisasi_id');
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('poster');
            $table->json('data_formulir');
            $table->enum('status', ['tersedia', 'tutup']);
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
        Schema::dropIfExists('rekrutmen');
    }
}
