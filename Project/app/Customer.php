<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $guard = 'customer';
    protected $fillable = [
        'username',
        'email',
        'name',
        'password',
        'phone',
        'subscribed'
    ];
    protected $hidden = [
        'password'
    ];

}
