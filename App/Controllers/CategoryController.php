<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Category;
use \Core\View;
use \Core\Controller;

/**
 * HomeController controller
 */
class CategoryController extends Controller
{

    public function __construct()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()){
            header('Location: /login');
        }
    }
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        View::renderTemplate('Categories/index.html', ['categories' => $categories]);
    }

    public function create()
    {
        View::renderTemplate('Categories/create.html');
    }

    public function store()
    {
//        $category = new Category();  //Menyra 1
//        $category->name = $_POST['name'];
//        $category->save();

        Category::create($_POST); // menyra 2

        header("Location: /categories");
    }

    public function show()
    {

    }

    public function edit()
    {
        $category = Category::find($_GET['id']);

        View::renderTemplate('Categories/edit.html', ['category' => $category]);
    }

    public function update()
    {
        $category = Category::find($_POST['id']);
        $category->name = $_POST['name'];
        $category->save();

        header("Location: /categories");
    }

    public function destroy()
    {
        $category = Category::find($_GET['id']);
        $category->delete();

        header("Location: /categories");
    }
}
