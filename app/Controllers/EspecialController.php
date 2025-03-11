<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EspecialController extends BaseController
{
    public function index()
    {
        //
    }
	public function developerDay(){
		return view ( 'especial/developerDay' );
	}
}
