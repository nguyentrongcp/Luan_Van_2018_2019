<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'admins';

    public static function Existed($email)
    {
        return (Employees::where('email', $email)->count() > 0);
    }

    public function decentralizes() {
        return $this->belongsToMany(
            Decentralization::class,
            'decentralize_employees',
            'admin_id',
            'decentralization_id');
    }

    public function checkDecentralization($id)
    {
        if ($this->role == 0)
        {
            return true;
        }

        $roles = $this->decentralizes->toArray();

        foreach ($roles as $role)
        {
            if ($role['id'] == $id)
                return true;
        }

        return false;
    }

    public function isAdmin()
    {
        return $this->role == 0;
    }

    public function matchedIds($id) {
        return $id == $this->id;
    }
}
