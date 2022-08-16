<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('prodId');
            $table->string('name',25);
            $table->bigInteger('catId')->unsigned()->index();
            $table->foreign('catId')->references('catId')->on('category');
            $table->string('descShort',30);
            $table->string('descLong',2500);
            $table->float('price');
            $table->integer('discountPerc');
            $table->tinyInteger('discounted');
            $table->text('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
