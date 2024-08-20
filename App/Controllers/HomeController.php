<?php

namespace App\Controllers;

use \Core\View;
use \Core\Controller;

/**
 * HomeController controller
 */
class HomeController extends Controller
{
    public function index()
    {
        $user = 'Urim Zymberi';
        View::renderTemplate('Dashboard/index.html',['user'=>$user]);
    }
}
