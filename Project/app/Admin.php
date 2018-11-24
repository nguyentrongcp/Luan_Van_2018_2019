<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Admin extends Authenticatable
{
    protected $hidden = [
        'password', 'remember_token',
    ];
    private static function adminGuard() {
        $guard = Auth::guard('admin');
        return $guard;
    }
    public static function adminLogged() {
        return self::adminGuard()->check();
    }

    public static function adminId() {
        return self::adminGuard()->id();
    }

    public static function adminEmail() {
        return self::admin()->email;
    }

    public static function adminName() {
        return self::admin()->name;
    }
    public static function adminAvatar(){
        return self::admin()->avatar;
    }

    public static function adminPhone() {
        return self::admin()->phone;
    }

    public static function admin() {
        return self::adminGuard()->user();
    }

    public static function isAdmin(){
        return self::admin()->role_id == 1;
    }
}
