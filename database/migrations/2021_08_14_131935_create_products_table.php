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
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->mediumText('summary');
            $table->longText('description')->nullable();
            $table->longText('additional_info')->nullable();
            $table->longText('return_cancellation')->nullable();
            $table->integer('stock')->default(0);
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('child_cat_id')->nullable();
            $table->string('photo');
            $table->string('size_guide')->nullable();
            $table->float('price')->default(0);
            $table->float('offer_price')->default(0);
            $table->float('discount')->default(0);
            $table->string('size');
            $table->enum('conditions',['new','popular','winter'])->default('new');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->enum('status',['active','inactive'])->default('active');

            
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade'); //cascade means MySQL to delete the rows from the child table automatically, when the rows from the parent table are deleted
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('child_cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('SET NULL');
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
