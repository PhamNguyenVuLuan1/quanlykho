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
        Schema::create('yeucau', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoiyeucau_id')->constrained('nguoidung');
            $table->foreignId('khoaphongyeucau_id')->constrained('khoaphong');
            $table->foreignId('sanphamyeucau_id')->constrained('sanpham');
            $table->integer('soluongyeucau');
            $table->string('tinhtrang'); //đã duyệt, chưa duyệt, đã hủy...
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yeucau');
    }
};
