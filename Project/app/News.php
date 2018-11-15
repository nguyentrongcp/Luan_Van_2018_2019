<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function newsVisiteds() {
        return $this->hasMany(NewsVisited::class);
    }

    public function getVisited() {
        return $this->newsVisiteds()->sum('count');
    }
    public static function existedTitle($title){
        return (News::where('title',$title)->count() > 0);
    }
}
