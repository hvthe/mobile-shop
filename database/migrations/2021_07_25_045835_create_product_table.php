<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('prd_id')->autoIncrement();
            // $table->primary('prd_id');
            $table->integer('cat_id');
            $table->string('prd_name', 255);
            $table->string('prd_price', 255);
            $table->string('prd_image', 255);
            $table->string('prd_warranty', 255);
            $table->string('prd_accessories', 255);
            $table->string('prd_new', 255);
            $table->string('prd_promotion', 255);
            $table->tinyInteger('prd_status');
            $table->tinyInteger('prd_featured');
            $table->string('prd_details', 255);
            $table->datetime('created');
            $table->timestamp('last_update', $precision = 0);
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
