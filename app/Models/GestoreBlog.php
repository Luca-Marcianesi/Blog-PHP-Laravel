<?php

namespace App\Models;

use App\Models\Resources\Post;
use App\Models\Resources\Blog;
use App\Models\Resources\Amicizia;
use App\Models\Resources\Notifica;
use App\Models\Resources\Accesso;

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

    public static function accesso($idUser,$idBlog){
        $accesso = Accesso::where('blog',$idBlog)
                            ->where('utente',$idUser)
                            ->get();
        if(count($accesso) == 0) return false;
        else return true;
    }

    public function sedNotifiche($blogId){
        $blog = Blog::find($blogId);
        if($blog->stato){
            //manda  la notifica tutti gli amici
            $idAmici = Amicizia::where(function ($query) use ($blog) {
                                    $query->select('destinatario as id')
                                            ->where('richiedente', $blog->proprietario)
                                            ->where('stato',true); 
                                    })
                                ->orWhere(function ($query)  use ($blog){
                                    $query->select('richiedente as id')
                                            ->where('destinatario',$blog->proprietario)
                                            ->where('stato',true); 
                                    })
                                ->get();
            
            foreach($idAmici as $id ){
                $notifica = new Notifica;
                $notifica->destinatario = $id->id;
                $notifica->messaggio = "Un nuovo messaggio sul blog ". $blog->tema;
                $notifica->save();

            }
            
        }
        else{

            //manda  la notifica tutti gli amici che hanno accesso al blog
           $idAccesso = Accesso::select('utente as id')
                                ->where('blog',$blogId)
                                ->get();

            foreach($idAccesso as $id ){
                    $notifica = new Notifica;
                    $notifica->destinatario = $id->id;
                    $notifica->messaggio = "Un nuovo messaggio sul blog ". $blog->tema;
                    $notifica->save();
            }
        }
    }

   

}
