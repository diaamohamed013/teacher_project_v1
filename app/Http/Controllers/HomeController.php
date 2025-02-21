<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()?->is_teacher)
        {
            $studentsCount = Student::count();
            $coursesCount = Course::count();
            $sectionsCount = Section::count();
            return view('site.pages.dashboard.index', compact('studentsCount', 'coursesCount', 'sectionsCount'));
        }
        return view('site.pages.home');
    }
}
