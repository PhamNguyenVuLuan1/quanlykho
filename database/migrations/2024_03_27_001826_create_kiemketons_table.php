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
        Schema::create('kiemketon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoikiemke_id')->constrained('nguoidung');
            $table->foreignId('sanphamkiemke_id')->constrained('sanpham');
            $table->integer('soluongtonkho');
            $table->integer('soluongthucte');
            $table->integer('chenhlech');
            
            $table->text('mota')->nullable(); // chênh lệch giữa số lượng tồn và số lượng thực tế là bao nhiêu
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kiemketon');
    }
};
