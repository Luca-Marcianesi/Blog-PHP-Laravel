<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewBlogRequest;
use App\Http\Requests\NewSearchRequest;
use App\Models\Resources\Blog;
use App\User;
use App\Models\Resources\Messaggio;
use App\Models\Resources\Amicizia;
use App\Models\GestoreAmici;

class userController extends Controller {

    protected $_AmiciModel;

    public function __construct() {
        $this->middleware('auth');
        $this->_AmiciModel = new GestoreAmici;
    }


    public function newBlog(NewBlogRequest $request){ 

        $blog = new Blog;
        $blog->proprietario = auth()->user()->id;
        $blog->tema = $request->tema;
        $blog->save();

        $primoMessaggio = new Messaggio;
        $primoMessaggio->autore = auth()->user()->id;
        $primoMessaggio->blog =$blog->id;
        $primoMessaggio->testo =$request->messaggio;
        $primoMessaggio->save();


        return redirect()->route('home');

              
    }

    public function getMyBlogs(){
        $blogs = Blog::where('proprietario',auth()->user()->id)->get();
        return view('myBlogs')
            ->with('blogs', $blogs);

    }

    public function searchFriends(NewSearchRequest $request){

        $users = User::where('role','user')
                        ->where('id','!=',auth()->user()->id)
                        ->where(function ($query) use ($request) {
                                    if(substr($request->name, -1) == '*'){
                                            $name = rtrim($request->name, "*");
                                            $query->orWhereLike('name',$name); 
                                    }
                                    else{
                                        $query->orWhere('name', $request->name);
                                    }
                                    if(substr($request->surname, -1) == '*'){
                                            $surname = rtrim($request->surname, "*");
                                            $query->orWhereLike('surname',$surname); 
                                    }
                                    else{
                                        $query->orWhere('surname', $request->surname);
                                    }

               
                                    })
                                ->get();
        return view('searchResult')
            ->with('users', $users);

    }

    public function getProfilo($id){
        $utente = User::find($id);
        $amicizia = Amicizia::where(function ($query)  use ($id){
                                    $query->where('richiedente', $id)
                                            ->where('destinatario',auth()->user()->id);
                                    })
                                ->orWhere(function ($query)  use ($id){
                                    $query->where('richiedente', auth()->user()->id)
                                            ->where('destinatario', $id);
                                    })
                                    ->take(1)
                                    ->get();
        if($utente->visibilita){
            return view('profiloUtente')
                ->with('utente',$utente)
                ->with('amicizia',$amicizia);
        }
        else{
            if(count($amicizia) == 0){
                return view('profiloUtente')
                    ->with('utente',$utente);
            }
            else{
                return view('profiloUtente')
                    ->with('utente',$utente)
                    ->with('amicizia',$amicizia);
            }

        }
        

        
    }


    
    public function amicizia($id){
        $amicizia = new Amicizia;
        $amicizia->richiedente = auth()->user()->id;
        $amicizia->destinatario = $id;
        $amicizia->save();

        return view('homeUser');
    }


    public function rispostaAmicizia($id,$risposta){
        $amicizia =  Amicizia::find($id);
        $amicizia->stato = $risposta; 
        $amicizia->visualizzata = true;
        $amicizia->save();

    }

    public function getAmici(){
        $amici = $this->_AmiciModel->getAmici(auth()->user()->id);
        return view('listaAmici')
                        ->with('amici', $amici);

    }
    public function index() {
        return view('user');
    }

}
