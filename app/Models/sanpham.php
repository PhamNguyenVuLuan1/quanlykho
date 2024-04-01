<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class sanpham extends Model
{
    protected $table = 'sanpham';
 
    public function loaisanpham(): BelongsTo
    {
        return $this->belongsTo(loaisanpham::class, 'loaisanpham_id', 'id');
    }

    public function nhacungcap(): BelongsTo
    {
        return $this->belongsTo(nhacungcap::class, 'nhacungcap_id', 'id');
    }
    public function nhapkho(): HasMany
    {
        return $this->hasMany(nhapkho::class, 'sanphamnhap_id', 'id');
    }
    public function yeucau(): HasMany
    {
        return $this->hasMany(yeucau::class, 'sanphamyeucau_id', 'id');
    }
}
