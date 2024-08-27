<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use \Core\View;
use \Core\Controller;


class BorrowController extends Controller
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
        $borrows = Borrow::orderBy('id', 'desc')->with('user')->with('student')->with('book')->get();
        View::renderTemplate('Borrows/index.html', ['borrows' => $borrows]);
    }

    public function create()
    {
        $books = Book::orderBy('title')->get();
        $students = Student::orderBy('first_name')->get();
        View::renderTemplate('Borrows/create.html', ['books' => $books, 'students' => $students]);
    }

    public function store()
    {
        $borrow = new Borrow();
        $borrow->book_id = $_POST['book_id'];
        $borrow->user_id = 1;
        $borrow->student_id = $_POST['student_id'];
        $borrow->borrow_date = $_POST['borrow_date'];
        $borrow->price = $_POST['price'];
        $borrow->comment = $_POST['comment'];
        $borrow->save();

        header('Location: /borrows');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $books = Book::orderBy('title')->get();
        $students = Student::orderBy('first_name')->get();
        $borrow = Borrow::findOrFail($id);
        View::renderTemplate('Borrows/edit.html', ['borrow' => $borrow, 'books' => $books, 'students' => $students]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $borrow = Borrow::findOrFail($id);
        $borrow->book_id = $_POST['book_id'];
        $borrow->student_id = $_POST['student_id'];
        $borrow->borrow_date = $_POST['borrow_date'];
        $borrow->return_date = $_POST['return_date'];
        $borrow->price = $_POST['price'];
        $borrow->comment = $_POST['comment'];
        $borrow->update();
        header('Location: /borrows');
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();
        header('Location: /borrows');
    }
}
