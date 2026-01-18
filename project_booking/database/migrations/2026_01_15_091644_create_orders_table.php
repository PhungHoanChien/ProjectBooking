<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id('order_id');              // PK, auto_increment
            $table->unsignedBigInteger('user_id'); // FK, KHÔNG auto_increment

            $table->timestamp('order_date')->useCurrent();
            $table->integer('total_price');
            $table->string('status', 50)->default('pending');

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
