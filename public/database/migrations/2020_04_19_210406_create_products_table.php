<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->Increments('id');
            $table->string('name');
            $table->text('details')->nullable();
            $table->integer('quantity')->default(0);

            $table->UnsignedInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->UnsignedInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('image')->nullable()->default('images/avatar.svg');;
            $table->boolean('is_advertise')->default(false);
 
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
