<?php

namespace App\Models;

use App\Models\Resources\Amicizia;
use App\User;

class GestoreAmici {

    public function getAmicizieInviateId($myID) {
        
        $users = Amicizia::select('destinatario')
                    ->where('richiedente', $myID)
                    ->where('stato',true)->get();

        return $users;
    }

    public function getAmicizieRicevuteId($myID) {

        $users = Amicizia::select('richiedente')
                    ->where('destinatario', $myID)
                    ->where('stato',true)->get();

        return $users;
    }

    public function getAmici($myId){

        return User::whereIn('id',$this->getAmicizieRicevuteId($myId))
                    ->orWhereIn('id',$this->getAmicizieInviateId($myId))
                    ->get();

    }

    public static function isFriend($id){
        $amicizia = Amicizia::where(function ($query)  use ($id){
                                $query->where('richiedente', $id)
                                        ->where('destinatario',auth()->user()->id)
                                        ->where('stato',true);
                                     })
                            ->orWhere(function ($query)  use ($id){
                                $query->where('richiedente', auth()->user()->id)
                                        ->where('destinatario', $id)
                                        ->where('stato',true);;
                                    })
                                    ->get();
        if(empty($amicizia)) return false;
        else return true;


    }



    

   

}
