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
        Schema::create('khoaphong', function (Blueprint $table) {
            $table->id();
            $table->string('tenkhoaphong');
            $table->string('tenkhoaphong_slug');
            $table->string('loaikhoaphong');
            $table->string('trangthai'); // đang bảo trì, đóng cửa,hoạt động
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khoaphong');
    }
};
