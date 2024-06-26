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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loaisanpham_id')->constrained('loaisanpham');
            $table->foreignId('nhacungcap_id')->constrained('nhacungcap');
            $table->string('tensanpham');
            $table->string('tensanpham_slug');
            $table->integer('soluong');
            $table->string('donvitinh'); // cái, thùng, hộp....
            $table->double('dongia');
            $table->string('hinhanh')->nullable();
            $table->text('motasanpham')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};
