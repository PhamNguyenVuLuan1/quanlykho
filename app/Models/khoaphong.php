<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class khoaphong extends Model
{
    protected $table = 'khoaphong';
    public function xuatkho(): HasMany
    {
        return $this->hasMany(xuatkho::class, 'khoaphongxuat_id', 'id');
    }
    public function yeucau(): HasMany
    {
        return $this->hasMany(yeucau::class, 'khoaphongyeucau_id', 'id');
    }
}
