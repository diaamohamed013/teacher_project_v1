<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view('site.pages.grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.pages.grades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeRequest $request)
    {
        $grade = new Grade();
        $grade->name = $request->input('name');
        $grade->symbol = $request->input('symbol');
        $grade->save();
        return redirect()->route('grades.index')->with('success', 'Grade created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        $courses = Course::where('grade_id',$grade->id)->get();
        return view('site.pages.grades.show', compact('grade','courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view('site.pages.grades.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeRequest $request, Grade $grade)
    {
        $grade->name = $request->input('name');
        $grade->symbol = $request->input('symbol');
        $grade->update();
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Brand Deleted Successfully');
    }
}
