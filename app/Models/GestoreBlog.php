<?php

namespace App\Models;

use App\Models\Resources\Messaggio;
use App\Models\Resources\Blog;

class GestoreBlog {

    public function getMessaggiByBlogId($blogId) {
        return Messaggio::where('id', $blogId)->get();
    }

    public function deleteAllBlogByBlogId($blogId) {
        $blog = Blog::find($blogId);
        $blog->delete();
        $messaggi = getMessaggiByBlogId($blogId);
        $messaggi->delete();
    }

   

}
