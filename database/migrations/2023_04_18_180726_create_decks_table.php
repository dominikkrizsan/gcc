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
        Schema::create('decks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('engine');
            $table->float('ztoh');
            $table->float('qmile');
            $table->float('hp');
            $table->float('tq');
            $table->integer('weight');
            $table->float('ptow')->nullable();
            $table->integer('tier');
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
        Schema::dropIfExists('decks');
    }
};