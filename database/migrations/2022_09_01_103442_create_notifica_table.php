<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateNotificaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('destinatario');
            $table->integer('mittente')->nullable();
            $table->string('messaggio')->nullable();
            $table->boolean('visualizzata')->default(false);
            $table->datetime('data');
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
        Schema::dropIfExists('notifica');
    }
}
