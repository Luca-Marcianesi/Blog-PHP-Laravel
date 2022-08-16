<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $table = 'blog';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
