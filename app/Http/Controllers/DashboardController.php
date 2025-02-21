<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentsCount = Student::count();
        $coursesCount = Course::count();
        $sectionsCount = Section::count();
        return view('site.pages.dashboard.index', compact('studentsCount', 'coursesCount', 'sectionsCount'));
    }
}
