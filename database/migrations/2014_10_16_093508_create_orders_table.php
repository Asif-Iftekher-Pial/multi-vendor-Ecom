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
            $table->string('name')->nullable();

            $table->string('email')->nullable();

            $table->string('phone')->nullable();

            $table->double('amount')->nullable();

            $table->longText('address');


            $table->string('status')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency')->nullable();


// ......................................................



            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('order_number',10)->unique()->nullable();
            $table->float('sub_total')->default('0');
            $table->float('total_amount')->default('0');
            $table->float('coupon')->default(0)->nullable();
            $table->float('delivery_charge')->default('0')->nullable();
            $table->string('payment_method')->default('cod');
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->enum('condition',['pending','processing','delivered','cancelled'])->default('pending');



            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('country')->nullable();
           // $table->string('address');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->mediumText('note')->nullable();



             // for shipping address

            $table->string('sfirst_name')->nullable();
            $table->string('slast_name')->nullable();
            $table->string('semail')->nullable();
            $table->string('sphone')->nullable();
            $table->string('scountry')->nullable();
            $table->string('saddress')->nullable();
            $table->string('scity')->nullable();
            $table->string('sstate')->nullable();

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
