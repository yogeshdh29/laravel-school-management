<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }

    private function validateRequest() {
        return request()->validate([
            'name' => 'required|min: 3',
            'class' => 'required|',
            'attendace' => '',
        ]);        
    }

    public function index() {
        $student = Student::all();
        return view('students.index', compact('student'));
    }

    public function create() {
        $student = new Student();
        return view('students.create',compact('student'));
    }

    public function store() {
        $student = Student::create($this->validateRequest());
        return redirect('students/create')->with('message', 'Thankss for your message, we will be in touch.');
    }

    public function edit(Student $student) {
        $students = Student::all();
        return view('students.edit', compact('student'));
    }
    public function update(Student $student) {
        $student->update($this->validateRequest());
        return redirect('students');
    }
}
