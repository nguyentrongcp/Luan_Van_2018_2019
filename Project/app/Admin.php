<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $hidden = [
        'password', 'remember_token',
    ];
}
