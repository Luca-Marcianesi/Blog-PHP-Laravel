<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBlogRequest;
use App\Http\Requests\NewSearchRequest;
use App\Http\Requests\NewPostRequest;
use App\Http\Requests\ProfiloRequest;
use App\Http\Requests\CercaRequest;
use App\Http\Requests\StatoBlogRequest;
use App\Models\Resources\Blog;
use App\Models\Resources\Notifica;
use App\User;
use App\Models\Resources\Post;
use App\Models\Resources\Amicizia;
use App\Models\GestoreAmici;
use App\Models\GestoreBlog;

use Illuminate\Support\Facades\Validator;

class StafController extends Controller {

    protected $_GestoreBlog;


    public function __construct() {
        $this->middleware('auth');
        $this->_GestoreBlog= new GestoreBlog;
    }

    public function cercaUtente(UtenteRequest $request){
        $utenti = User::where('username',$request->username)
                        ->get();
        return view('elencoUtenti')
                ->with('utenti',$utenti);
    }

    public function getBlog($id){
        $blog = Blog::find($id);
        $post = $this->_GestoreBlog->getPostByBlogId($id);

        return view('blog')
                ->with('blog',$blog)
                ->with('posts',$post);

    }

    public function deleteBlog(MotivoRequest $request,$id){
        $blog = Blog::find($id);
        $notifica = new Notifica;
        $notifica->destinatario = $blog->proprietario;
        $notifica->messaggio = "Il tuo blog" . $blog->tema . "è stato cancellato perchè:" . $request->motivo;
        $notifica->save();
        $this->_GestoreBlog->deleteBlogByBlogId($id);
    }

    public function deletePost(MotivoRequest $request,$id){
        $post = Post::find($id);
        $notifica = new Notifica;
        $notifica->destinatario = $post->autore;
        $notifica->messaggio = "Il tuo post" . $post->messaggio . "è stato cancellato perchè:" . $request->motivo;
        $notifica->save();
        $post->delete();
    }

    public function visualizzaUtente(CercaRequest $request){
        $utente = User::find($request->id);
        $blogs = Blog::where('proprietario',$request->id)->get();
        $posts = Post::where('autore',$request->id)
                        ->join('blog', 'blog.id', '=', 'post.blog')
                        ->select('blog.*','post.*')
                        ->get();

        return view('attivitaUtente')
                ->with('user',$utente)
                ->with('blogs',$blogs)
                ->with('posts',$posts);
        
    }

    public function visualizzaBlog(CercaRequest $request){
        $blog = Blog::find($request->id);

        $proprietario = User::find($blog->proprietario);

        $posts = Post::Where('blog',$request->id)
                    ->join('users', 'users.id', '=', 'post.autore')
                    ->select('users.*','post.*')
                    ->get();

        return view('blog')
            ->with('blog',$blog)
            ->with('proprietario',$proprietario)
            ->with('posts',$posts);
        
    }



    

  
}
