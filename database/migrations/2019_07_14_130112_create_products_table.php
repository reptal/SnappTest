<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150);
            $table->integer('price');
            $table->text('description');
            $table->integer('stock_count');
            $table->string('image_url');
            //category reference
            $table->unsignedBigInteger('category_id')
                ->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            //end category reference
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
        Schema::dropIfExists('products');
    }
}
