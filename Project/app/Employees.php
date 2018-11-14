<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employees extends Model
{
    protected $table = 'admins';

    public static function Existed($email)
    {
        return (Employees::where('email', $email)->count() > 0);
    }

//    public function roles(){
//        return $this->hasMany(EmployeeRole::class);
//    }

    public function checkRoles($id)
    {
        if ($this->role_id == 1) {
            return true;
        }

        $idr = Employees::find(Admin::adminId())->role_id;
        $roles = DB::table('admins as a')
            ->join('employee_roles as e', 'e.role_id', '=', 'a.role_id')
            ->where('a.role_id', '=', $idr)
            ->get();
        foreach ($roles as $role) {
            if ($role->function_id == $id)
                return true;
        }
        return false;

    }

    public function isAdmin()
    {
        return $this->role_id == 1;
    }

    public function matchedIds($id)
    {
        return $id == $this->id;
    }
}
