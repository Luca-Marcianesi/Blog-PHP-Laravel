<?php

namespace App\Models;

use App\Models\Resources\Amicizia;
use App\User;

class GestoreRicerca {
    
    
   

    public function getAmici($id, $xpag = 100) {
        
        return Amicizia::where(function ($query) use ($id) {
                                $query->where('richiedente', $id)
                                        ->where('stato',true); 
                                })
                        ->orWhere(function ($query) use($id) {
                                $query->where('destinatario',$id)
                                        ->where('stato',true); 
                                })
                        ->join('users', function ($join) use ($id){
                                $join->on('users.id', '=', 'amicizia.destinatario')
                                        ->where('users.id', '!=', $id )
                                        ->orOn('users.id', '=', 'amicizia.richiedente')
                                            ->where('users.id', '!=', $id );
                                })
                        ->select('users.name','users.surname','amicizia.data','users.id as user_id','amicizia.id as amicizia_id')
                        ->orderBy('users.surname')
                        ->paginate($xpag);
    }

    public function cercaAmici($myId , $nome , $cognome , $xpag = 100){
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
                            ->paginate($xpag);          

    }
}