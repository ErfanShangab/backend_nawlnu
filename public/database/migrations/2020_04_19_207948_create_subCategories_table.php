<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->text('details')->nullable();
            $table->string('image')->nullable()->default('images/avatar.svg');
            $table->UnsignedInteger('category_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');;

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
        Schema::dropIfExists('sub_categories');
    }
}
