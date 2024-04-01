<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class nguoidung extends Authenticatable
{
    use HasFactory, Notifiable;
 
    protected $table = 'nguoidung';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    public function yeucau(): HasMany
    {
        return $this->hasMany(yeucau::class, 'nguoiyeucau_id','id');
    }

    public function kiemketon(): HasMany
    {
        return $this->hasMany(kiemketon::class, 'nguoikiemke_id','id');
    }
    public function nhapkho(): HasMany
    {
        return $this->hasMany(nhapkho::class, 'nguoinhap_id','id');
    }
    public function xuatkho(): HasMany
    {
        return $this->hasMany(xuatkho::class, 'nguoixuat_id','id');
    }
}
