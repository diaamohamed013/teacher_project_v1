<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\SectionDetails;
use Illuminate\Http\Request;

class SectionDetailController extends Controller
{

    public function create(Request $request)
    {
        if ($request->has('section_id'))
        {
            $sec_id = $request->input('section_id');
            $section = Section::where('id',$sec_id)->first();
            if (empty($section))
            {
                return redirect()->back();
            }
            return view('site.pages.sections_detail.create',compact('section'));
        }
        return redirect()->back();
    }

    public function edit(SectionDetails $detail)
    {
        return view('site.pages.sections_detail.edit',compact('detail'));
    }

    public function store(Request $request)
    {
        $section_detail = new SectionDetails();
        $section_detail->section_title  = $request->get('section_title');
        $section_detail->details        = $request->get('details');
        $section_detail->url            = $request->get('url');
        $section_detail->section_id     = $request->get('section_id');
        $section_detail->type           = $request->get('type');
        $section_detail->save();

        return redirect()->route('section.create',['course_id'=> $request->get('course_id')]);
    }


    public function update(Request $request, SectionDetails $detail)
    {
        $detail->section_title  = $request->get('section_title');
        $detail->details        = $request->get('details');
        $detail->url            = $request->get('url');
        $detail->section_id     = $request->get('section_id');
        $detail->type           = $request->get('type');

        $detail->update();
        return redirect()->route('section.create',['course_id'=> $request->get('course_id')]);
    }
}
