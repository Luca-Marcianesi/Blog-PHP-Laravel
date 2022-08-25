<?php

namespace App\Http\Controllers;

use App\Models\Catalog;

class PublicController extends Controller {

    protected $_catalogModel;
    
    public function __construct() {
        $this->_catalogModel = new Catalog;
    }


}
