<?php

namespace App\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use \Core\View;
use \Core\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->with('category')->get();

        View::renderTemplate('Books/index.html', ['books' => $books]);
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $authors = Author::orderBy('first_name')->orderBy('last_name')->get();

        View::renderTemplate('Books/create.html', ['categories' => $categories, 'authors' => $authors]);
    }

    public function store()
    {
        dd($_POST);
        $book = new Book();
        $book->title = $_POST['title'];
        $book->isbn = $_POST['isbn'];
        $book->category_id = $_POST['category_id'];
        $book->save();

        header('Location: /books');
    }

    public function edit()
    {

        View::renderTemplate('Users/edit.html');
    }

    public function update()
    {
        header('Location: /users');
    }

    public function destroy()
    {
        header('Location: /users');
    }
}
