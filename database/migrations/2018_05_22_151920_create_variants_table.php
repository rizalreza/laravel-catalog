<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('variants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('type_id')->nullable()->unsigned();
            $table->foreign('type_id')->references('id')->on('types');
            $table->integer('size_id')->nullable()->unsigned();
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->integer('currency_id')->unsigned();
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->integer('nett_price');
            $table->integer('stock');


            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();        
        Schema::dropIfExists('variants');
    }
}
