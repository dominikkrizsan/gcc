<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_collection', function (Blueprint $table) {
            $table->id();
            $table->foreign('player_connection_id')->references('cards')->on('card_collection');
            $table->foreign('machine_card_id')->references('machine_card_id')->on('card_collection');
            $table->json('cards');
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
        Schema::dropIfExists('card_collection');
    }
}
