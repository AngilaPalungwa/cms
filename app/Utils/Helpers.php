<?php

namespace App\Utils;

use App\Models\Post;

class Helpers
{
    public  static function increaseViews($postId)
    {
        if (!$postId){
            return false;
        }
        Post::where('id', $postId)->increment('views');

    }

}
