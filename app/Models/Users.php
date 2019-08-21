<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password', 'remember_token'
    ];
}