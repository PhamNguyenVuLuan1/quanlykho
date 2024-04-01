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
        Schema::create('nhapkho', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoinhap_id')->constrained('nguoidung');
            $table->foreignId('sanphamnhap_id')->constrained('sanpham');
            $table->foreignId('loaisanphamnhap_id')->constrained('loaisanpham');
            $table->foreignId('nhacungcapnhap_id')->constrained('nhacungcap');
            $table->integer('soluongnhapkho');
            $table->string('donvitinh'); // cái, thùng, hộp,
            $table->double('gianhap');
            $table->double('thanhtien');         
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhapkho');
    }
};
