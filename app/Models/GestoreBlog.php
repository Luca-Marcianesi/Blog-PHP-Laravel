<?php

namespace App\Models;

use App\Models\Resources\Post;
use App\Models\Resources\Blog;

class GestoreBlog {

    public function getPostByBlogId($blogId) {
        return Post::where('blog', $blogId)->get();
    }

    public function deleteBlogByBlogId($blogId) {
        $blog = Blog::find($blogId);
        $blog->delete();
        $messaggi = getMessaggiByBlogId($blogId);
        $messaggi->delete();
    }

   

}
