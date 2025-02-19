@extends('site.master')

@section('title', 'Courses')


@section('content')
    <x-header title="الكورسات"></x-header>

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="d-flex justify-content-between align-items-center" style="font-size: 22px;">
                                    Courses
                                    <a href="{{ route('courses.create') }}" class="btn btn-primary py-3"
                                        style="font-size: 16px;">
                                        Add New Course
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered table-striped">
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
                                                        @if ($course->sections->isNotEmpty())
                                                            <table class="table table-sm table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Section Name</th>
                                                                        <th>Section Title</th>
                                                                        <th>Type</th>
                                                                        <th>URL</th>
                                                                        <th>Details</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($course->sections as $section)
                                                                        @foreach ($section->sectionDetails as $detail)
                                                                            <tr>
                                                                                <td>{{ $section->name }}</td>
                                                                                <td>{{ $detail->section_title }}</td>
                                                                                <td>{{ $detail->type }}</td>
                                                                                <td>{{ $detail->url }}</td>
                                                                                <td>{{ $detail->details }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        @else
                                                            No sections available
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('courses.edit', $course->id) }}"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                        <form action="{{ route('courses.destroy', $course->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">Delete</button>
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
        </section>
        <!-- /.content -->
    </div>
@endsection
