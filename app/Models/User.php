<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'store_name',
        'email',
        'phone',
        'password_hash',
        'ward',
        'district',
        'city',
        'agreed_policy',
    ];

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    protected $casts = [
        'agreed_policy' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Mutator: Cho phép dùng $user->password để gán password_hash
    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->password_hash,
            set: fn ($value) => ['password_hash' => Hash::make($value)],
        );
    }
}
