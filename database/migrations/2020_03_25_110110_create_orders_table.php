<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('cost');
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->string('type');
            $table->string('order_details');
            $table->integer('town_id');
            $table->string('status');
            $table->string('image')->nullable();
            $table->boolean('is_payed')->default(false);
            $table->integer('Quantity')->default(1);


              $table->UnsignedInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->UnsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
 
            $table->UnsignedInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('drivers');

            $table->UnsignedInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');


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
        Schema::dropIfExists('orders');
    }
}
