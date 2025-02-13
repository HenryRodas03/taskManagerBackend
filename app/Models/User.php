<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasApiTokens;

    public $timestamps = true;

    protected $table = 'users';

    protected $fillable = [
        'user_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

    public static function getUserByEmail($email)
    {
        return User::where('email', trim(strtolower($email)))
            ->select('id', 'user_name', 'email', 'password')
            ->first();
    }
}
