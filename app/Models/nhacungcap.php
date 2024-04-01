<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class nhacungcap extends Model
{
    protected $table = 'nhacungcap';
 
    public function sanpham(): HasMany
    {
        return $this->hasMany(sanpham::class, 'nhacungcap_id', 'id');
    }

    public function nhapkho(): HasMany
    {
        return $this->hasMany(nhapkho::class, 'nhacungcapnhap_id', 'id');
    }
}
