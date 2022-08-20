<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewBlogRequest;
use App\Http\Requests\NewSearchRequest;
use App\Models\Resources\Blog;
use App\User;
use App\Models\Resources\Messaggio;

class userController extends Controller {

    public function __construct() {
        $this->middleware('auth');
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

        $friends = User::where(function ($query) use ($request) {
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
        /*
        $friends->get();
        */


        /*
        if(substr($request->name, -1) == '*'){
            $name = rtrim($request->name, "*");
            $friends = User::orWhereLike('name',$name)->get(); 
        }

        if(substr($request->surname, -1) == '*'){
            $surname = rtrim($request->surname, "*");
        }
        
        $friends = User::where('name',$request->name)
                        ->orWhereLike('name',$name)->get();
        
        /*


        $friends = User::where(function ($query) use ($request){
            if(substr($request->name, -1) == '*'){

                $name = rtrim($request->name, "*"); //levo l'asterisco finale
                $query->orWhereLike('name',$name);

                }
            else{
                $query->orWhere('name',$request->name);
                }
        });
        
        $friends->get();
        */
        return view('searchResult')
            ->with('friends', $friends);

    }


    public function index() {
        return view('user');
    }

}
