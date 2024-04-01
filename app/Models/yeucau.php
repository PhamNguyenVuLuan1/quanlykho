<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class yeucau extends Model
{
    protected $table = 'yeucau';
 
    public function nguoidung(): BelongsTo
    {
        return $this->belongsTo(nguoidung::class, 'nguoiyeucau_id', 'id');
    }
  
    public function khoaphong(): BelongsTo
    {
        return $this->belongsTo(khoaphong::class, 'khoaphongyeucau_id', 'id');
    }
    public function sanpham(): BelongsTo
    {
        return $this->belongsTo(sanpham::class, 'sanphamyeucau_id', 'id');
    }
}
