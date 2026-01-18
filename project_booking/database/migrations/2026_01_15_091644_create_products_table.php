<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB'; 
            $table->id();
            $table->string('name', 150);
            $table->unsignedBigInteger('manu_id');
            $table->unsignedBigInteger('type_id');
            $table->integer('price');
            $table->string('pro_image', 150);
            $table->text('description');
            $table->boolean('feature');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('manu_id')->references('manu_id')->on('manufactures');
            $table->foreign('type_id')->references('type_id')->on('protypes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
