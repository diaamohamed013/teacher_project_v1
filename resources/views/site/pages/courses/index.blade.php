@extends('site.master')

@section('title', 'Courses')
@section('css')
    <style>
        .teacherHeader {
            padding: 15rem 2rem;
        }
    </style>
@endsection
@section('content')
    <x-header title="الكورسات"></x-header>

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content px-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <div class="card mt-3 cardRound">
                            <div class="card-body">
                                <h4 class="d-flex justify-content-between align-items-center mb-3" style="font-size: 22px;">
                                    Courses
                                    <a href="{{ route('courses.create') }}" class="btn btn-primary py-3"
                                        style="font-size: 16px;">
                                        Add New Course
                                    </a>
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped tableNoWrap">
                                        <thead>
                                            <tr>
                                                <th>Grade Name</th>
                                                <th>Course Title</th>
                                                <th>Sub Title</th>
                                                <th>Price</th>
                                                <th>Sale Price</th>
                                                <th>Video URL</th>
                                                <th>Description</th>
                                                <th>Sections</th>
                                                <th>Actions</th> <!-- Action buttons column -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($grades as $grade)
                                                @foreach ($grade->courses as $course)
                                                    <tr>
                                                        <td>{{ $grade->name }}</td>
                                                        <td>{{ $course->title }}</td>
                                                        <td>{{ $course->sub_title }}</td>
                                                        <td>{{ $course->price }}</td>
                                                        <td>{{ $course->sale_price }}</td>
                                                        <td>{{ $course->video_url }}</td>
                                                        <td>{{ $course->description }}</td>
                                                        <td>

                                                        <a href="{{ route('section.create',['course_id'=> $course->id]) }}"
                                                           class="btn text-success tooltipIcon">
                                                            <i class="fa-solid fa-info"></i>
                                                            <span class="tooltiptext">add sections</span>
                                                        </a>

{{--                                                            @if ($course->sections->isNotEmpty())--}}
{{--                                                                <table class="table table-sm table-bordered">--}}
{{--                                                                    <thead>--}}
{{--                                                                        <tr>--}}
{{--                                                                            <th>Section Name</th>--}}
{{--                                                                            <th>Section Title</th>--}}
{{--                                                                            <th>Type</th>--}}
{{--                                                                            <th>URL</th>--}}
{{--                                                                            <th>Details</th>--}}
{{--                                                                        </tr>--}}
{{--                                                                    </thead>--}}
{{--                                                                    <tbody>--}}
{{--                                                                        @foreach ($course->sections as $section)--}}
{{--                                                                            @foreach ($section->sectionDetails as $detail)--}}
{{--                                                                                <tr>--}}
{{--                                                                                    <td>{{ $section->name }}</td>--}}
{{--                                                                                    <td>{{ $detail->section_title }}</td>--}}
{{--                                                                                    <td>{{ $detail->type }}</td>--}}
{{--                                                                                    <td>{{ $detail->url }}</td>--}}
{{--                                                                                    <td>{{ $detail->details }}</td>--}}
{{--                                                                                </tr>--}}
{{--                                                                            @endforeach--}}
{{--                                                                        @endforeach--}}
{{--                                                                    </tbody>--}}
{{--                                                                </table>--}}
{{--                                                            @else--}}
{{--                                                                No sections available--}}
{{--                                                            @endif--}}
                                                        </td>
                                                        <td style="white-space: nowrap;">
                                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                                class="btn text-success tooltipIcon">
                                                                <i class="fa fa-edit"></i>
                                                                <span class="tooltiptext">Edit</span>
                                                            </a>
                                                            <form action="{{ route('courses.destroy', $course->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn text-danger tooltipIcon shadow-none"
                                                                    onclick="return confirm('Are you sure?')">
                                                                    <i class="fa fa-trash"></i>
                                                                    <span class="tooltiptext">Delete</span>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
