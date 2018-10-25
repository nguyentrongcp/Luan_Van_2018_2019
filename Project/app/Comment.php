<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

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
    public function children() {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
    public function approved(){
        return $this->is_approved == 1;
    }
}
