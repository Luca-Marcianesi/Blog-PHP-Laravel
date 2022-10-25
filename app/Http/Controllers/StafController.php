<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBlogRequest;
use App\Http\Requests\MotivoRequest;
use App\Http\Requests\NewSearchRequest;
use App\Http\Requests\NewPostRequest;
use App\Http\Requests\ProfiloRequest;
use App\Http\Requests\CercaUtenteRequest;
use App\Http\Requests\CercaBlogRequest;
use App\Http\Requests\StatoBlogRequest;
use App\Models\Resources\Blog;
use App\Models\Resources\Notifica;
use App\User;
use App\Models\Resources\Post;
use App\Models\Resources\Amicizia;
use App\Models\GestoreAmici;
use App\Models\GestoreBlog;
use Illuminate\Routing\UrlGenerator;

use Illuminate\Support\Facades\Validator;

class StafController extends Controller {

    protected $_GestoreBlog;


    public function __construct() {

        $this->middleware('can:isGestore');
        $this->_GestoreBlog= new GestoreBlog;
    }

    public function cercaUtente(UtenteRequest $request){

        $utenti = User::where('username',$request->username)
                        ->get();
        return view('elencoUtenti')
                ->with('utenti',$utenti);
    }

    public function deleteBlog(MotivoRequest $request,$id){

        $blog = Blog::find($id);

        $notifica = new Notifica;
        $notifica->destinatario = $blog->proprietario;
        $notifica->riferimento = $blog->id;
        $notifica->messaggio = "Il tuo blog" . $blog->tema . "è stato cancellato perchè:" . $request->motivo;
        $notifica->data = date("Y-m-d H:i:s");
        $notifica->save();

        $this->_GestoreBlog->deleteBlogByBlogId($id);

        return redirect()->route('ricerca');
    }

    public function deletePost(MotivoRequest $request,$id){

        $post = Post::find($id);

        $blog = $post->blog;

        $notifica = new Notifica;
        $notifica->riferimento = $blog;
        $notifica->destinatario = $post->autore;
        $notifica->messaggio = "Il tuo post " . $post->testo . " è stato cancellato perchè: ".$request->motivo;
        $notifica->data = date("Y-m-d H:i:s");
        $notifica->save();

        $post->delete();

        return redirect()->route('tornaAlBlog',[$blog]);
    }

    public function visualizzaUtente(CercaUtenteRequest $request){

        $utente = User::find($request->idUtente);
        if(!empty($utente)){

        $blogs = Blog::where('proprietario',$request->idUtente)->get();
        $posts = $this->_GestoreBlog->getPostByAutore($request->idUtente);

       
        return view('attivitaUtente')
                ->with('user',$utente)
                ->with('blogs',$blogs)
                ->with('posts',$posts);
        }
        else{
            return view('attivitaUtente')
                    ->with('utentent', $request->idUtente);
        }
        
        
    }

    public function tornaAlBlog($idBlog){

        $blog = Blog::find($idBlog);

        
       
        $proprietario = User::find($blog->proprietario);
        

        $posts = $this->_GestoreBlog->getPostByBlogId($idBlog);

        return view('gestioneBlog')
                ->with('blog',$blog)
                ->with('proprietario',$proprietario)
                ->with('posts',$posts);
        
    }

    public function visualizzaBlog(CercaBlogRequest $request){
        $blog = Blog::find($request->idBlog);

        
        if(!empty($blog)){
        $proprietario = User::find($blog->proprietario);


        $posts =  $this->_GestoreBlog->getPostByBlogId($request->idBlog);

        return view('gestioneBlog')
                ->with('blog',$blog)
                ->with('proprietario',$proprietario)
                ->with('posts',$posts);
                    
        }
        
        
        else{
            return view('gestioneBlog')
                    ->with('blognt',$request->idBlog);
        }
            
        
    }

    public function inserisciMotivoBlog($id){

        $indietro = url()->previous(); 

        return view('eliminaBlog-Post-gestore')
                ->with('indietro',$indietro)
                ->with('blog',$id);
    }

    public function inserisciMotivoPost($idpost , $idBlog){

        $indietro = url()->previous();

        return view('eliminaBlog-Post-gestore')
                ->with('indietro',$indietro)
                ->with('blogId',$idBlog)
                ->with('post',$idpost);
    }



    

  
}
