<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\GradeRequest;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Section;
use App\Models\SectionDetails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::with('courses.sections.sectionDetails')->get(); // Load grades with courses, sections, and section details
        return view('site.pages.courses.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::get();
        return view('site.pages.courses.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        DB::beginTransaction();
        try {
            // Fetch the grade
            // $grade = $request->input('grade_id');
            // if (!$grade) {
            //     throw new \Exception('No grade found in the database.');
            // }

            // Create the course
            $course = new Course();
            $course->grade_id = $request->input('grade_id');
            $course->title = $request->input('title');
            $course->sub_title = $request->input('sub_title');
            $course->price = (float) $request->input('price'); // Ensure price is numeric
            $course->sale_price = (float) $request->input('sale_price'); // Ensure sale_price is numeric
            $course->video_url = $request->input('video_url');
            $course->description = $request->input('description');

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->store('courses', 'public');
                $course->image = "storage/" . $fileName;
            }

            if (!$course->save()) {
                throw new \Exception('Error creating course.');
            }

            // Handle multiple sections
//            $sections = $request->input('name', []);
//            $section_titles = $request->input('section_title', []);
//            $urls = $request->input('url', []);
//            $types = $request->input('type', []);
//            $details = $request->input('details', []);
//
//            foreach ($sections as $index => $sectionName) {
//                // Create a new section
//                $section = new Section();
//                $section->course_id = $course->id;
//                $section->name = $sectionName;
//
//                if (!$section->save()) {
//                    throw new \Exception('Error creating section.');
//                }
//
//                // Create section details for this section
//                $sectionDetails = new SectionDetails();
//                $sectionDetails->section_id = $section->id;
//                $sectionDetails->section_title = $section_titles[$index] ?? null;
//                $sectionDetails->type = $types[$index] ?? null;
//                $sectionDetails->url = $urls[$index] ?? null;
//                $sectionDetails->details = $details[$index] ?? null;
//
//                if (!$sectionDetails->save()) {
//                    throw new \Exception('Error creating section details.');
//                }
//            }

            DB::commit();
            return redirect()->route('courses.index')->with('success', 'Course created successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('site.pages.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            // Find the course by ID
            $course = Course::with('sections.sectionDetails')->findOrFail($id);

            // Fetch grades for the dropdown (if applicable)
            $grades = Grade::all();

            return view('site.pages.courses.edit', compact('course', 'grades'));
        } catch (\Exception $e) {
            return redirect()->route('courses.index')->with('error', 'Failed to load course data: ' . $e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            // Find the course
            $course = Course::findOrFail($id);

            // Update course details
            $course->grade_id = $request->input('grade_id');
            $course->title = $request->input('title');
            $course->sub_title = $request->input('sub_title');
            $course->price = (float)$request->input('price');
            $course->sale_price = (float)$request->input('sale_price');
            $course->video_url = $request->input('video_url');
            $course->description = $request->input('description');

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->store('courses', 'public');
                $course->image = "storage/" . $fileName;
            }

            if (!$course->save()) {
                throw new \Exception('Failed to update course.');
            }

//            $sectionId = $request->input('sectionId');
//            $sectionName = $request->input('name');
//            foreach ($sectionId as $index => $id) {
//                $section = Section::findOrFail($id);
//                $section->name = $sectionName[$index];
//                if (!$section->save()) {
//                    throw new \Exception('Failed to update section names.');
//                }
//            }
//            $detailsId = $request->input('detailsId');
//            $section_titles = $request->input('section_title');
//            $urls = $request->input('url');
//            $types = $request->input('type');
//            $details = $request->input('details');
//            foreach ($detailsId as $index => $id) {
//                $detail = SectionDetails::findOrFail($id);
//                $detail->section_title = $section_titles[$index];
//                $detail->type = $types[$index];
//                $detail->url = $urls[$index];
//                $detail->details = $details[$index];
//                if (!$detail->save()) {
//                    throw new \Exception('Failed to update section details.');
//                }
//            }
//            $sections = $request->input('name_new', []);
//            $section_titles = $request->input('section_title_new', []);
//            $urls = $request->input('url_new', []);
//            $types = $request->input('type_new', []);
//            $details = $request->input('details_new', []);
//
//            foreach ($sections as $index => $sectionName) {
//                // Create a new section
//                $section = new Section();
//                $section->course_id = $course->id;
//                $section->name = $sectionName;
//
//                if (!$section->save()) {
//                    throw new \Exception('Error creating section.');
//                }
//
//                // Create section details for this section
//                $sectionDetails = new SectionDetails();
//                $sectionDetails->section_id = $section->id;
//                $sectionDetails->section_title = $section_titles[$index] ?? null;
//                $sectionDetails->type = $types[$index] ?? null;
//                $sectionDetails->url = $urls[$index] ?? null;
//                $sectionDetails->details = $details[$index] ?? null;
//
//                if (!$sectionDetails->save()) {
//                    throw new \Exception('Error creating section details.');
//                }
//            }
            DB::commit();
            return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            // Find the course by ID
            $course = Course::findOrFail($id);

            // Delete related sections and section details
            foreach ($course->sections as $section) {
                // Delete section details
                $section->sectionDetails()->delete();
                // Delete section
                $section->delete();
            }

            // Delete the course
            $course->delete();

            DB::commit();

            return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('courses.index')->with('error', 'Failed to delete course: ' . $e->getMessage());
        }
    }
}
