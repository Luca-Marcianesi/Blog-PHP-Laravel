<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'post';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
