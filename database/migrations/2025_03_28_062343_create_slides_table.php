<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Đường dẫn ảnh slide
            $table->string('caption')->nullable(); // Chú thích slide
            $table->timestamps();
            $table->boolean('top')->default(0);

        });
    }

    public function down()
    {
        Schema::dropIfExists('slides');
    }
};
