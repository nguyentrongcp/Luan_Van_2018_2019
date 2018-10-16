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

<<<<<<< HEAD
=======
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function imageComments() {
        return $this->hasMany(ImageComment::class);
    }
>>>>>>> 4304afe0890ba6fdd4c4ec3901c1d5a7246cc4fe
}
