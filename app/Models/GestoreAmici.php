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

    

   

}
