<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class loaisanpham extends Model
{
    protected $table = 'loaisanpham';
 
    public function sanpham(): HasMany
    {
        return $this->hasMany(sanpham::class, 'loaisanpham_id', 'id');
    }
    public function nhapkho(): HasMany
    {
        return $this->hasMany(nhapkho::class, 'loaisanphamnhap_id', 'id');
    }
}
