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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number',10)->unique();
            $table->float('sub_total')->default('0');
            $table->float('total_amount')->default('0');
            $table->float('coupon')->default(0)->nullable();
            $table->float('delivery_charge')->default('0')->nullable();
            $table->string('payment_method')->default('cod');
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->enum('condition',['pending','processing','delivered','cancelled'])->default('pending');
            


            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->mediumText('note');


            // for shipping address

            $table->string('sfirst_name');
            $table->string('slast_name');
            $table->string('semail');
            $table->string('sphone');
            $table->string('scountry');
            $table->string('saddress');
            $table->string('scity');
            $table->string('sstate');


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
