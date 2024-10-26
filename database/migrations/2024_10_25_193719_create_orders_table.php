<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('total_price', 8, 2);
            $table->enum('order_status', ['Pending', 'In progress', 'Completed', 'Canceled', 'Refunded'])->default('Pending');// e.g., 'pending', 'completed', 'canceled', etc.
            $table->timestamps();

        });

    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

