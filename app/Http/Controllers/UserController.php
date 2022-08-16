<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewBlogRequest;
use App\Models\Resources\Blog;
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

    public function index() {
        return view('user');
    }

}
