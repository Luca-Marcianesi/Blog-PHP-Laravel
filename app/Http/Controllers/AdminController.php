<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Resources\Blog;
use App\Models\Resources\Amicizia;
use App\Http\Requests\NewStafRequest;
use App\Http\Requests\StatisticheRequest;
use App\Http\Requests\ModificaStafRequest;
use App\User;
use App\Models\GestoreAmici;

class AdminController extends Controller {

    protected $_AmiciModel;


    public function __construct() {
        $this->_AmiciModel = new GestoreAmici;
    }

    public function newStaf(NewStafRequest $request){
        $staf = new User;
        $staf->name = $request->name;
        $staf->surname = $request->surname;
        $staf->email = $request->email;
        $staf->username = $request->username;
        $staf->password = Hash::make($request->password);
        $staf->data_nascita = $request->data_nascita;
        $staf->role = 'staf';

        $staf->save();

        return $this->getStaf();
    }

    public function eliminaStaf($id){
        $staf =  User::find($id);
        $staf->delete();
        
        return $this->getStaf();
    }

    public function getModificaStaf($id){
        $staf = User::find($id);
        return view('modificaStaf')
                ->with('staf',$staf);
    }

    public function modificaStaf(ModificaStafRequest $request,$id){
        $staf = User::find($id);
        $staf->name = $request->name;
        $staf->surname = $request->surname;
        if(!empty($request->password)){
           $staf->password = Hash::make($request->password); 
        }
        
        $staf->data_nascita = $request->data_nascita;
        $staf->save();

        return $this->getStaf();
    }


    public function getStaf(){
        $staf = User::where('role','staf')
                    ->get();

        return view('gestioneStaf')
                ->with('staf',$staf);
    }

    public function getMainStatistiche(){
        $blogs = Blog::get();
        $numeroBlog = count($blogs);

        return view('statistiche')
                ->with('numeroBlog',$numeroBlog);
    }



    public function getStatisticheSpecifiche(StatisticheRequest $request){
        $utenti = User::where('username', $request->username)
                            ->get();

                            
        if(empty($utenti)){
            return view('statisticheSpecifiche');
        }
        else{
            if($request->tipo){

                // Richieste di amicizia del membro
                            
                foreach($utenti as $utente){
                                
                    $amicizie = Amicizia::where('destinatario',$utente->id)
                                    ->get();

                    return view('statisticheSpecifiche')
                        ->with('utente',$utente)
                        ->with('amicizie',$amicizie);
                    }
            }
            else{

                //Gruppo di amici del membro

                $utenti = User::where('username', $request->username)
                                ->get();

                foreach($utenti as $utente){
                
                $gruppoAmici = $this->_AmiciModel->getAmici($utente->id);
                                    

                return view('statisticheSpecifiche')
                    ->with('utente',$utente)
                    ->with('gruppoAmici',$gruppoAmici);
                }

        } 

        }
        }

    }
