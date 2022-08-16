<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Messaggio extends Model {

    protected $table = 'messaggio';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
