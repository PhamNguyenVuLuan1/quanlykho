<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class nhapkho extends Model
{
    protected $table = 'nhapkho';
    public function nguoidung(): BelongsTo
    {
        return $this->belongsTo(nguoidung::class, 'nguoinhap_id', 'id');
    }
    public function sanpham(): BelongsTo
    {
        return $this->belongsTo(sanpham::class, 'sanphamnhap_id', 'id');
    }
    
    public function loaisanpham(): BelongsTo
    {
        return $this->belongsTo(loaisanpham::class, 'loaisanphamnhap_id', 'id');
    }   
    public function nhacungcap(): BelongsTo
    {
        return $this->belongsTo(nhacungcap::class, 'nhacungcap_id', 'id');
    }
}
