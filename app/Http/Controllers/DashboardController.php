<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\payment;
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
        $payments = payment::latest()->take(5)->get();

        return view('site.pages.dashboard.index', compact(
            'studentsCount',
            'coursesCount',
            'sectionsCount',
            'payments')
        );
    }
}
