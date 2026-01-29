<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';  // ✅ DIPERBAIKI: 'id' bukan 'id_user'
    public $incrementing = true;
    public $timestamps = true;  // ✅ DIPERBAIKI: true karena ada created_at/updated_at

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',  // ✅ DIPERBAIKI: 'name' sesuai dengan kolom database
        'email',
        'password',
        'role',
        'email_verified_at',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');  // ✅ Tambahkan foreign key
    }
}