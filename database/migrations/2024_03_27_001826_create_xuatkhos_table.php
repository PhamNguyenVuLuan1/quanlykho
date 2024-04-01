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
        Schema::create('xuatkho', function (Blueprint $table) {
            $table->id();
            $table->foreignId('khoaphongxuat_id')->constrained('khoaphong');
            $table->foreignId('sanphamxuat_id')->constrained('sanpham');    
            $table->foreignId('nguoixuat_id')->constrained('nguoidung');        
            $table->integer('soluongxuat');
            $table->string('donvitinh'); // cái, thùng, hộp, ....
            $table->double('giaxuat');
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
        Schema::dropIfExists('xuatkho');
    }
};
