<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDuser');
            $table->foreign('IDuser')->references('id')->on('users')->onDelete('cascade');
            
            $table->dateTime('order_date');
            $table->decimal('total_amount', 15, 0); // hoặc int nếu bạn không dùng thập phân
            $table->string('payment_method');
            $table->text('note')->nullable();
            $table->string('status')->default('chưa duyệt');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['IDuser']);
            $table->dropColumn('IDuser');
        });
    }
};
