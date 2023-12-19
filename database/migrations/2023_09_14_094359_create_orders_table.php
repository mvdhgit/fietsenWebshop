<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration

{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->foreignId('user_id'); // Foreign key to associate orders with users
            $table->decimal('total_amount', 10, 2); // Decimal field for total order amount
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered'])->default('pending');
            $table->timestamps(); // Created_at and updated_at timestamps
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('zipcode');
            $table->enum('payment_method', ['postduif', 'ideal', 'paypal']);
            // Add other order-related columns as needed


        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
