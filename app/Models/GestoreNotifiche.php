<?php

namespace App\Models;

use App\Models\Resources\Notifica;
use App\User;

class GestoreNotifiche {

        public function getNotifiche() {
            return Notifica::where('destinatario', auth()->user()->id)
                            ->where('visualizzata', false)
                            ->orderBy('data','desc')
                            ->get();
        }

        public function numeroNotifiche() {
                return Notifica::where('destinatario', auth()->user()->id)
                                ->where('visualizzata', false)
                                ->count();
            }

        public function getArchiviate() {
                return Notifica::where('destinatario', auth()->user()->id)
                                ->where('visualizzata', true)
                                ->get();
            }
}