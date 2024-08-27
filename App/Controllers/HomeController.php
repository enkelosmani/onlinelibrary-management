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
        View::renderTemplate('Landing/index.html');
    }
}
