<?php

namespace App\Models;

use App\Models\Resources\Post;
use App\Models\Resources\Blog;
use App\Models\Resources\Amicizia;
use App\Models\Resources\Notifica;
use App\Models\Resources\Accesso;

class GestoreBlog {

    public function getPostByBlogId($blogId, $ordine = 'desc') {

        return Post::where('blog',$blogId)
                    ->join('users', 'users.id', '=', 'post.autore')
                    ->select('users.*','post.*')
                    ->orderBy('data',$ordine)
                    ->get();
    }

    public function getPostByAutore($autore){
        return Post::where('autore',$autore)
                    ->join('blog', 'blog.id', '=', 'post.blog')
                    ->select('blog.*','post.*')
                    ->get();
    }

    public function deleteBlogByBlogId($blogId) {

        $blog = Blog::find($blogId);
        $blog->delete();
        $this->deleteBlogPostByBlogId($blogId);
       
    }

    public function getBlogVisibili($utenteId , $utenteLoggatoId){

        return Blog::where('proprietario',$utenteId)
                    ->leftJoin('accesso', 'accesso.blog', '=', 'blog.id')
                    ->where('stato',true)
                    ->orWhere('utente', $utenteLoggatoId)
                    ->select('blog.*')
                    ->get();
    }

    public function deleteBlogPostByBlogId($blogId) {

       $posts = Post::where('blog',$blogId)
                    ->delete();
                  
    }

    public static function puoPostare($id){

        $amicizia = Amicizia::where(function ($query)  use ($id){
                                $query->where('richiedente', $id)
                                        ->where('destinatario',auth()->user()->id)
                                        ->where('stato',true);
                                     })
                            ->orWhere(function ($query)  use ($id){
                                $query->where('richiedente', auth()->user()->id)
                                        ->where('destinatario', $id)
                                        ->where('stato',true);
                                    })
                                    ->get();
        if(count($amicizia) == 0 and $id != auth()->user()->id) return false;
        else return true;
    }

    public static function accesso($idUser,$idBlog){
        $accesso = Accesso::where('blog',$idBlog)
                            ->where('utente',$idUser)
                            ->get();
        if(count($accesso) == 0) return false;
        else return true;
    }

    public function elimanaAccessi($idPossessoreAccesso , $idProprietarioBlog){

        $blogs = Blog::where('proprietario',$idProprietarioBlog)
                    ->select('id')
                    ->get();
            

        $accessi = Accesso::where('utente',$idPossessoreAccesso)
                        ->whereIn('blog',$blogs)
                        ->get();

        foreach($accessi as $accesso){
            $accesso->delete();
        }                                 
    }

    public function sedNotifiche($blogId, $mittente){
        $blog = Blog::find($blogId);

        $notifica = new Notifica;
        $notifica->riferimento = $blog->id;
        $notifica-> mittente = $mittente;
        $notifica->destinatario = $blog->proprietario;
        $notifica->data = date("Y-m-d H:i:s");
        $notifica->messaggio = "Un nuovo messaggio sul blog ". $blog->tema;
        $notifica->save();


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
                $notifica->riferimento = $blog->id;
                $notifica-> mittente = $mittente;
                $notifica->destinatario = $id->id;
                $notifica->data = date("Y-m-d H:i:s");
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
                    $notifica->riferimento = $blog->id;
                    $notifica->destinatario = $id->id;
                    $notifica->data = date("Y-m-d H:i:s");
                    $notifica->messaggio = "Un nuovo messaggio sul blog ". $blog->tema;
                    $notifica->save();
            }
        }
    }

   

}
