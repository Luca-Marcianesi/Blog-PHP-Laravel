<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateAmiciziaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amicizia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('richiedente');
            $table->integer('destinatario');
            $table->boolean('visualizzata')->default(false);
            $table->boolean('stato')->default(false);
            $table->date('data');

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
        Schema::dropIfExists('amicizia');
    }
}
