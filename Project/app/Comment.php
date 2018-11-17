<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    public function amountOfComment()
    {
        $amountOfComment = 0;
        foreach (Foody::all() as $foodies) {
            $amountOfComment = Comment::where('foody_id', $foodies->id)->count();
        }
        return $amountOfComment;
    }


    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function imageComments() {
        return $this->hasMany(ImageComment::class);
    }
    public function miniComments() {
        return $this->hasMany(MiniComment::class);
    }

    public function approved(){
        return $this->is_approved == 1;
    }
    public static function getUnapprovedComments() {
        $comments = DB::table('comments')
            ->where([
                ['is_approved', 0],
            ])
            ->join('foodies', 'comments.foody_id', '=', 'foodies.id')
            ->get();

        return $comments;
    }

}
