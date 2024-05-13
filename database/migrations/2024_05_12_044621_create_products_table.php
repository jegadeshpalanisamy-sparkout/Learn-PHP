<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $randomOrderId = Str::random(6);
      
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->unsignedBigInteger('customer_id');
            $table->integer('order_id')->default(rand(1111,10000));
            $table->integer('quantity');
            $table->decimal('per_amount', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['available','unavailable'])->default('available');     
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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



};
