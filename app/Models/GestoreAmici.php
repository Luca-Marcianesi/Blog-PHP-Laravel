<?php

namespace App\Models;

use App\Models\Resources\Amicizia;
use App\User;

class GestoreAmici {
    
    
   

    public function getAmici($id) {
        
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
                        ->get();
    }


    public function getRichiesteRicevute(){
        return Amicizia::where('destinatario',auth()->user()->id)
                            ->where('visualizzata',false)
                            ->where('stato',false)
                            ->join('users', 'users.id', '=', 'amicizia.richiedente')
                            ->select('users.*','amicizia.*')
                            ->get();

    }

    public function getAmicizieRifiutate(){

        return Amicizia::where(function ($query)  {
                                $query->where('richiedente', auth()->user()->id)
                                        ->where('visualizzata',true)
                                        ->where('stato',false); 
                                })
                        ->orWhere(function ($query)  {
                                $query->where('destinatario',auth()->user()->id)
                                        ->where('visualizzata',true)
                                        ->where('stato',false); 
                                })
                        ->join('users', function ($join) {
                                $join->on('users.id', '=', 'amicizia.destinatario')
                                        ->where('users.id', '!=',auth()->user()->id )
                                        ->orOn('users.id', '=', 'amicizia.richiedente')
                                        ->where('users.id', '!=',auth()->user()->id );
                                })
                        ->select('users.name','users.surname','amicizia.data','users.id as user_id','amicizia.id as amicizia_id')
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
        if(count($amicizia) == 0) return false;
        else return true;
    }


    public static function isRifiutata($id){
        $amicizia = Amicizia::where(function ($query)  use ($id){
                                $query->where('richiedente', $id)
                                        ->where('destinatario',auth()->user()->id)
                                        ->where('visualizzata',true)
                                        ->where('stato',false);

                                     })
                            ->orWhere(function ($query)  use ($id){
                                $query->where('richiedente', auth()->user()->id)
                                        ->where('destinatario', $id)
                                        ->where('visualizzata',true)
                                        ->where('stato',false);
                                    })
                                    ->get();
        if(count($amicizia) == 0) return false;
        else return true;
    }

    public static function isSospesa($id){
        $amicizia = Amicizia::where(function ($query)  use ($id){
                                $query->where('richiedente', $id)
                                        ->where('destinatario',auth()->user()->id)
                                        ->where('visualizzata',false)
                                        ->where('stato',false);

                                     })
                            ->orWhere(function ($query)  use ($id){
                                $query->where('richiedente', auth()->user()->id)
                                        ->where('destinatario', $id)
                                        ->where('visualizzata',false)
                                        ->where('stato',false);
                                    })
                                    ->get();
        if(count($amicizia) == 0) return false;
        else return true;
    }

    public static function richiedereAmicizia($id){
        $amicizia = Amicizia::where(function ($query)  use ($id){
                                $query->where('richiedente', $id)
                                        ->where('destinatario',auth()->user()->id);
                                     })
                            ->orWhere(function ($query)  use ($id){
                                $query->where('richiedente', auth()->user()->id)
                                        ->where('destinatario', $id);
                                    })
                                    ->get();
        if(count($amicizia) == 0) return true;
        else return false;
    }




    



    

   

}
