<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('site.pages.students.show', compact('students'));
    }

    public function studentProfile()
    {
        $student = auth()?->user()->student;
        if ($student == null) {
            return redirect()->abort(404);
        }
        // handel payment and finish profile.
        return view('site.pages.students.profile',compact('student'));
    }

    public function my_courses()
    {
        $student = auth()?->user()->student;
        if ($student == null) {
            return redirect()->abort(404);
        }

        return view('site.pages.students.courses',compact('student'));
    }

}
