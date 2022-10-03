<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBlogRequest;
use App\Http\Requests\NewSearchRequest;
use App\Http\Requests\NewPostRequest;
use App\Http\Requests\ProfiloRequest;
use App\Http\Requests\StatoBlogRequest;
use App\Models\Resources\Blog;
use App\Models\Resources\Notifica;
use App\User;
use App\Models\Resources\Post;
use App\Models\Resources\Amicizia;
use App\Models\GestoreAmici;
use App\Models\GestoreBlog;

use Illuminate\Support\Facades\Validator;

class userController extends Controller {

    protected $_AmiciModel;
    protected $_GestoreBlog;


    public function __construct() {
        $this->middleware('auth');
        $this->_AmiciModel = new GestoreAmici;
        $this->_GestoreBlog= new GestoreBlog;
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
        $primoMessaggio->blog =$blog->id;
        $primoMessaggio->testo =$request->messaggio;
        $primoMessaggio->save();


        return $this->getMyBlogs();

              
    }

    public function getMyBlogs(){
        $blogs = Blog::where('proprietario',auth()->user()->id)->get();
        return view('myBlogs')
            ->with('blogs', $blogs);

    }

    public function modificaBlog(StatoBlogRequest $request,$id){
        $blog = Blog::find($id);
        $blog->stato = $request->stato;
        $blog->save();

        return $this->getMyBlogs();
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
                                    if(substr($request->name, -1) == '*'){
                                            $name = rtrim($request->name, "*");
                                            $query->whereLike('name',$name); 
                                    }
                                    else{
                                        $query->Where('name', $request->name);
                                    }
                                    if(substr($request->surname, -1) == '*'){
                                            $surname = rtrim($request->surname, "*");
                                            $query->whereLike('surname',$surname); 
                                    }
                                    else{
                                        $query->Where('surname', $request->surname);
                                    }

               
                                    })
                                ->get();
        return view('searchResult')
            ->with('users', $users);

    }

    public function getBlog($id){
        $blog = Blog::find($id);

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

      

        return response()->json(['redirect' => route('profilo')]);

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
        $amicizia->stato = false; 
        $amicizia->visualizzata = true;
        $amicizia->save();

        $notifica = new Notifica;
        $notifica->messaggio =  auth()->user()->name . " " . auth()->user()->surname. "non è più tuo amico";
        $notifica->destinatario = $id_user;
        $notifica->save();

        return $this->getAmici();

    }
    

    public function rispostaAmicizia($id,$risposta){
        $amicizia =  Amicizia::find($id);
        $amicizia->stato = $risposta; 
        $amicizia->visualizzata = true;
        $amicizia->save();

        return $this->getAmici();

    }

    public function getAmici(){

        $amici = $this->_AmiciModel->getAmici(auth()->user()->id);

        $rifiutate = $this->_AmiciModel->getAmicizieRifiutate();

        $richieste = $this->_AmiciModel->getRichiesteRicevute();


        return view('listaAmici')
                        ->with('amici', $amici)
                        ->with('richieste',$richieste)
                        ->with('rifiutate',$rifiutate);

    }
  
    public function getNotifiche(){
        $notifiche = Notifica::where('destinatario',auth()->user()->id)
                                ->get();
        
        return view('notifiche')
                ->with('notifiche', $notifiche);
    }


    public function eliminaNotifica($notifica){
        $notifica = Notifica::find($notifica);
        $notifica->visualizzata = true;
        $notifica->save();
        $notifica->delete();

        return $this->getNotifiche();
    }


}
