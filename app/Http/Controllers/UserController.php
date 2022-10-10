<?php

namespace App\Http\Controllers;


use App\Http\Requests\NewBlogRequest;

use App\Http\Requests\NewSearchRequest;
use App\Http\Requests\NewPostRequest;
use App\Http\Requests\ProfiloRequest;
use App\Http\Requests\StatoBlogRequest;
use App\Models\Resources\Blog;
use App\Models\Resources\Notifica;
use App\Models\Resources\Accesso;
use App\User;
use App\Models\Resources\Post;
use App\Models\Resources\Amicizia;
use App\Models\GestoreAmici;
use App\Models\GestoreBlog;
use App\Models\GestoreNotifiche;

use Illuminate\Support\Facades\Validator;

class userController extends Controller {

    protected $_AmiciModel;
    protected $_GestoreBlog;
    protected $_GestoreNotifiche;


    public function __construct() {
        $this->middleware('auth');
        $this->_AmiciModel = new GestoreAmici;
        $this->_GestoreBlog= new GestoreBlog;
        $this->_GestoreNotifiche = new GestoreNotifiche;
    }

    public function index() {
        return view('profilo');
    }


    public function newBlog(NewBlogRequest $request){ 

        $blog = new Blog;
        $blog->proprietario = auth()->user()->id;
        $blog->tema = $request->tema;
        $blog->save();

        $primoMessaggio = new Post;
        $primoMessaggio->autore = auth()->user()->id;
        $primoMessaggio->blog = $blog->id;
        $primoMessaggio->testo = $request->messaggio;
        $primoMessaggio->save();


        return redirect()->route('myBlogs') ;

              
    }

    public function getMyBlogs(){
        $blogs = Blog::where('proprietario',auth()->user()->id)->get();
        return view('myBlogs')
            ->with('blogs', $blogs);

    }

    public function modificaBlog(StatoBlogRequest $request,$id){
        $blog = Blog::find($id);
        if($blog == null){
            return redirect()->route('myBlogs');
        }

        $blog->stato = $request->stato;
        $blog->save();

        return redirect()->route('myBlogs');
    }

    public function eliminaBlog($blog){
        $blog = Blog::find($blog);
        if($blog == null){
            return redirect()->route('myBlogs');
        }
        $blog->delete();

        return redirect()->route('myBlogs');
    }

    public function newPost(NewPostRequest $request , $id){
        $post = new Post;
        $post->autore = auth()->user()->id;
        $post->blog = $id;
        $post->testo = $request->testo;
        $post->save();

        $this->_GestoreBlog->sedNotifiche($id);

        return view('homeUser');

    }

    public function searchFriends(NewSearchRequest $request){
        $users = User::where('role','user')
                        ->where('id','!=',auth()->user()->id)
                        ->where(function ($query) use ($request) {
                            if (!empty($request->name)) {
                               if(substr($request->name, -1) == '*'){
                                    $name = rtrim($request->name, "*");
                                    $query->orWhere('name','like',$name.'%'); 
                                    }
                                else{
                                    $query->where('name', $request->name);
                                    }
                            }
                            if (!empty($request->surname)) {
                                if(substr($request->surname, -1) == '*'){
                                    $surname = rtrim($request->surname, "*");
                                    $query->orWhere('surname','like',$surname.'%'); 
                                }
                                else{
                                    $query->where('surname', $request->surname);
                                }

       
                            }})                               
                            ->get();
        
        return view('searchResult')
            ->with('users', $users);
            

    }

    public function getBlog($id){
        $blog = Blog::find($id);
        
        if($blog == null){
            return redirect()->route('myBlogs');
        }
        else{
            $proprietario = User::find($blog->proprietario);

        $posts = Post::Where('blog',$id)
                    ->join('users', 'users.id', '=', 'post.autore')
                    ->select('users.*','post.*')
                    ->get();

        return view('blogUser')
            ->with('blog',$blog)
            ->with('proprietario',$proprietario)
            ->with('posts',$posts);
        }

    }

    public function getProfilo($id){
        $utente = User::find($id);
        $blogs = Blog::where('proprietario',$id)
                    ->leftJoin('accesso', 'accesso.blog', '=', 'blog.id')
                    ->where('stato',true)
                    ->orWhere('utente',auth()->user()->id)
                    ->select('blog.*')
                    ->get();

            return view('profiloUtente')
                ->with('utente',$utente)
                ->with('blogs',$blogs);


        
    }

    public function modificaProfilo(ProfiloRequest $request){


        $profilo = User::find(auth()->user()->id);
        $profilo->fill($request->validated());    
        
        $profilo->save();

        return view('homeUser');

    }


    
    public function amicizia($id){
        
        $amiciziaRifiutata = $this->_AmiciModel->getAmicizia($id);

        if(count($amiciziaRifiutata) == 0){
            $amicizia = new Amicizia;
            $amicizia->richiedente = auth()->user()->id;
            $amicizia->destinatario = $id;
            $amicizia->save();
        }
        
        else{
            $amiciziaRifiutata->first->delete();
            $amicizia = new Amicizia;
            $amicizia->richiedente = auth()->user()->id;
            $amicizia->destinatario = $id;
            $amicizia->save();
        }

        return view('homeUser');
    }

    

    public function eliminaAmico($id_amicizia,$id_user){
        $amicizia =  Amicizia::find($id_amicizia);
        if($amicizia == null){
            return redirect()->route('amici');
        }
        else{
            $amicizia->stato = false; 
        $amicizia->visualizzata = true;
        $amicizia->save();

        $notifica = new Notifica;
        $notifica->messaggio = auth()->user()->name . " " . auth()->user()->surname . " " . " non è più tuo amico";
        $notifica->destinatario = $id_user;
        $notifica->save();

        return $this->getAmici();
        }
        

    }
    

    public function rispostaAmicizia($id,$risposta){
        $amicizia =  Amicizia::find($id);
        if($amicizia == null ){
            return redirect()->route('amici');
        }
        else{
          $amicizia->stato = $risposta; 
        $amicizia->visualizzata = true;
        $amicizia->save();

        return redirect()->route('amici'); 
        }
        

    }

    public function getAmici(){

        $amici = $this->_AmiciModel->getAmici(auth()->user()->id,3);

        $rifiutate = $this->_AmiciModel->getAmicizieRifiutate();

        $richieste = $this->_AmiciModel->getNuoveAmicizie(auth()->user()->id);


        return view('listaAmici')
                        ->with('amici', $amici)
                        ->with('richieste',$richieste)
                        ->with('rifiutate',$rifiutate);

    }
  
    public function getNotifiche(){
        $notifiche = $this->_GestoreNotifiche->getNotifiche();

        $archiviate = $this->_GestoreNotifiche->getArchiviate();
        
        return view('notifiche')
                ->with('notifiche', $notifiche)
                ->with('archiviate', $archiviate);
    }


    public function eliminaNotifica($notifica){
        $notifica = Notifica::find($notifica);
        $notifica->delete();

        return redirect()->route('notifiche');
    }

    public function archiviaNotifica($notifica){
        $notifica = Notifica::find($notifica);
        $notifica->visualizzata = true;
        $notifica->save();

        return redirect()->route('notifiche');
    }

    
    public function selezionaAmici($blogId){

        $amici = $this->_AmiciModel->getAmici(auth()->user()->id);

        $blog = Blog::find($blogId);

        $utentiAutorizzati = Accesso::where('blog',$blogId)
                                ->join('users','users.id','=','accesso.utente')
                                ->select('users.username','users.name','users.surname')
                                ->get();

        return view('selezionaAmici')
            ->with('autorizzati',$utentiAutorizzati)
            ->with('blog',$blog)
            ->with('amici', $amici);

    }

    public function setAccesso($blogId , $userId, $stato){

        if($stato){
            $accesso = new Accesso;
            $accesso->utente = $userId;
            $accesso->blog = $blogId;
            $accesso->save(); 
        }
        else{
            $accesso = Accesso::where('utente',$userId)
                                ->get();
            $accesso->first->delete();
        }

        
    
        return $this->selezionaAmici($blogId);
  

    
    }


}
