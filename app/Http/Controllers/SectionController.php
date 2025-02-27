<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function create(Request $request)
    {
        if ($request->has('course_id'))
        {
            $course = Course::where('id', $request->get('course_id'))->first();
            return view('site.pages.sections.create',compact('course'));
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $section = new Section();
        $section->name = $request->get('name');
        $section->course_id = $request->get('course_id');
        $section->save();
        return redirect()->back();
    }

    public function update(Section $section,Request $request)
    {
        if($request->has('name'))
        {

            $section->name = $request->input('name');
            $section->update();
            return redirect()->back();
        }
        return redirect()->back();
    }
}
