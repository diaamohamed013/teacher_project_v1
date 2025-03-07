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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $last_courses = Course::latest()->take(5)->get();

        if(auth()->user()?->is_teacher)
        {
            return redirect()->route('dashboard.index');
        }
        return view('site.pages.home',compact('last_courses'));
    }
}
