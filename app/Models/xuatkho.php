<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class xuatkho extends Model
{
    protected $table = 'xuatkho';
    public function nguoidung(): BelongsTo
    {
    return $this->belongsTo(nguoidung::class, 'nguoixuat_id', 'id');
    }
  
    public function sanpham(): BelongsTo
    {
    return $this->belongsTo(sanpham::class, 'sanphamxuat_id', 'id');
    }
  
    public function khoaphong(): BelongsTo
    {
        return $this->belongsTo(khoaphong::class, 'khoaphongxuat_id', 'id');
    }

}
