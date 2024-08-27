<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Student;
use \Core\View;
use \Core\Controller;

class StudentController extends Controller
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
        $students = Student::orderBy('id','desc')->get();

        View::renderTemplate('Students/index.html', ['students' => $students]);
    }

    public function create()
    {
        View::renderTemplate('Students/create.html');
    }

    public function store()
    {
        Student::create($_POST);

        header('Location: /students');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $student = Student::findOrFail($id);

        View::renderTemplate('Students/edit.html', ['student'=>$student]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $student = Student::findOrFail($id);
        $student->first_name = $_POST['first_name'];
        $student->last_name = $_POST['last_name'];
        $student->country = $_POST['country'];
        $student->city = $_POST['city'];
        $student->address = $_POST['address'];
        $student->phone = $_POST['phone'];
        $student->email = $_POST['email'];
        $student->status = $_POST['status'];
        $student->index_no = $_POST['index_no'];
        $student->update();

        header('Location: /students');
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $student = Student::findOrFail($id);
        $student->delete();

        header('Location: /students');
    }
}
