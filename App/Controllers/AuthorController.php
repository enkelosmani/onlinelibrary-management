<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Author;
use \Core\View;
use \Core\Controller;


class AuthorController extends Controller
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
        $authors = Author::orderBy('id','desc')->get();
        View::renderTemplate('Authors/index.html', ['authors' => $authors]);
    }

    public function create()
    {
        View::renderTemplate('Authors/create.html');
    }

    public function store()
    {
        $author = new Author();
        $author->first_name = $_POST['first_name'];
        $author->last_name = $_POST['last_name'];
        $author->country = $_POST['country'];
        $author->save();

        header('Location: /authors');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $author = Author::findOrFail($id);

        View::renderTemplate('Authors/edit.html', ['author'=>$author]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $author = Author::findOrFail($id);
        $author->first_name = $_POST['first_name'];
        $author->last_name = $_POST['last_name'];
        $author->country = $_POST['country'];
        $author->save();

        header('Location: /authors');
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $author = Author::findOrFail($id);
        $author->delete();
        header('Location: /authors');
    }
}
