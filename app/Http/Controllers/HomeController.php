<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()?->is_teacher)
        {
            $students = Student::all();
            return view('site.pages.students.show',compact('students'));
        }
        return view('site.pages.home');
    }
}
