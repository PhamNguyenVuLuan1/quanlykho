<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class kiemketon extends Model
{
    protected $table = 'kiemketon';
 
    public function nguoidung(): BelongsTo
    {
        return $this->belongsTo(nguoidung::class, 'nguoikiemke_id', 'id');
    }
  
    public function sanpham(): BelongsTo
    {
        return $this->belongsTo(sanpham::class, 'sanphamkiemke_id', 'id');
    }
    
}
