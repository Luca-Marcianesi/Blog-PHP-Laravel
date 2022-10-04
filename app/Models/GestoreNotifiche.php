<?php

namespace App\Models;

use App\Models\Resources\Notifica;
use App\User;

class GestoreNotifiche {

        public function getNotifiche() {
            return Notifica::where('destinatario', auth()->user()->id)
                            ->where('visualizzata', false)
                            ->get();
        }

        public function getArchiviate() {
                return Notifica::where('destinatario', auth()->user()->id)
                                ->where('visualizzata', true)
                                ->get();
            }
}