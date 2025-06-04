<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens, HasFactory;

    protected $hidden = ['password'];
    protected $fillable = [
        'full_name',
        'email',
        'address',
        'phone_number',
        'password',
    ];
}
