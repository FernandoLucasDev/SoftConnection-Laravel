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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('developer');
            $table->foreign('developer')->references('email')->on('developer');
            $table->string('client');
            $table->foreign('client')->references('email')->on('customers');
            $table->string('nome');
            $table->text('descrição');
            $table->date('inicio');
            $table->date('previsao_termino');
            $table->integer('porcentagem');
            $table->boolean('is_finished');
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
        Schema::dropIfExists('projects');
    }
};
