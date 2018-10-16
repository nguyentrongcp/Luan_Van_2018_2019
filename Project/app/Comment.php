<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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

}
