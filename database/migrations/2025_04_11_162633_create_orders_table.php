<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->text('note')->nullable();
            $table->string('payment');
            $table->integer('total');
            $table->integer('ship')->default(20000);

            $table->string('status')->default('chưa duyệt');
            $table->unsignedBigInteger('IDuser')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
