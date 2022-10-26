<?php

namespace App\Models;

use App\Models\Resources\Amicizia;
use App\User;

class GestoreRicerca {
    
    

    public function cercaAmici($myId , $nome , $cognome , $xpag = 4){
        return User::where('role','user')
                        ->where('id','!=',$myId)
                        ->where(function ($query) use ($nome,$cognome) {
                            if (!empty($nome)) {
                               if(substr($nome, -1) == '*'){
                                    $name = rtrim($nome, "*");
                                    $query->orWhere('name','like',$name.'%'); 
                                    }
                                else{
                                    $query->where('name', $nome);
                                    }
                            }
                            if (!empty($cognome)) {
                                if(substr($cognome, -1) == '*'){
                                    $surname = rtrim($cognome, "*");
                                    $query->orWhere('surname','like',$surname.'%'); 
                                }
                                else{
                                    $query->where('surname', $cognome);
                                }

       
                            }})                               
                            ->paginate($xpag);;          

    }


    public static function accountVisibile($id){
        $utente = User::find($id);
        return $utente->visibilita;
    }


}