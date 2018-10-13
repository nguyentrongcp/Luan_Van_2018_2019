<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
//    public static function Existed($email)
//    {
//        return (Admin::where('email', $email)->count() > 0);
//    }
//    public function decentralizes() {
//        return $this->belongsToMany(
//            DecentralizeEmployees::class,
//            'decentralize_employees',
//            'admin_id',
//            'decentralization_id');
//    }
//
//    public function checkDecetralize($id)
//    {
//        if ($this->role == 0)
//        {
//            return true;
//        }
//
//        $roles = $this->decentralizes->toArray();
//
//        foreach ($roles as $role)
//        {
//            if ($role['id'] == $id)
//                return true;
//        }
//
//        return false;
//    }
//
//    public function isAdmin()
//    {
//        return $this->role == 0;
//    }
//
//    public function matchedIds($id) {
//        return $id == $this->id;
//    }
    protected $hidden = [
        'password', 'remember_token',
    ];
}
