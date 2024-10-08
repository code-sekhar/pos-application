<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'mobile',
        'password',
        'otp'
    ];
    protected $attributes = [
        'otp' => '0'
    ];

}
