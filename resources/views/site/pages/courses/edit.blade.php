@extends('site.master')

@section('title', 'Courses')

@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        @if ($errors->any())
                            <ul class="alert alert-warning">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-flex justify-content-between align-items-center" style="font-size: 22px;">
                                    Edit Course
                                    <a href="{{ route('courses.index') }}" class="btn btn-danger" style="font-size: 16px;">
                                        Back
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('courses.update', $course->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Grade Dropdown -->
                                    <div class="mb-3">
                                        <label for="grade">Grade</label>
                                        <select name="grade_id" class="form-control">
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}"
                                                    {{ $course->grade_id == $grade->id ? 'selected' : '' }}>
                                                    {{ $grade->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Course Details -->
                                    <div class="mb-3">
                                        <label for="title">Course Title</label>
                                        <input type="text" name="title" value="{{ $course->title }}"
                                            class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="sub_title">Sub Title</label>
                                        <input type="text" name="sub_title" value="{{ $course->sub_title }}"
                                            class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" value="{{ $course->price }}"
                                            class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="sale_price">Sale Price</label>
                                        <input type="text" name="sale_price" value="{{ $course->sale_price }}"
                                            class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="video_url">Video URL</label>
                                        <input type="url" name="video_url" value="{{ $course->video_url }}"
                                            class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="image">Course Image</label>
                                        <input type="file" name="image" class="form-control" />
                                        <small>Current Image: <img src="{{ asset($course->image) }}" alt="Course Image"
                                                width="100"></small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control">{{ $course->description }}</textarea>
                                    </div>

                                    <!-- Sections -->
                                    <h5>Sections</h5>
                                    <div id="sectionContainer">
                                        @foreach ($course->sections as $section)
                                            {{-- @dd($section) --}}
                                            <div class="section-template">
                                                <div class="mb-3">
                                                    <label>Section Name</label>
                                                    <input type="text" name="name[]" value="{{ $section->name }}"
                                                        class="form-control" />
                                                    <input type="text" name="sectionId[]" value="{{ $section->id }}"
                                                        hidden />
                                                </div>

                                                @foreach ($section->sectionDetails as $detail)
                                                    <div class="mb-3">
                                                        <label>Section Title</label>
                                                        <input type="text" name="section_title[]"
                                                            value="{{ $detail->section_title }}" class="form-control" />
                                                        <input type="text" name="detailsId[]"
                                                            value="{{ $detail->id }}" hidden />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>URL</label>
                                                        <input type="url" name="url[]" value="{{ $detail->url }}"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Type</label>
                                                        <select name="type[]" class="form-control">
                                                            <option value="video"
                                                                {{ $detail->type == 'video' ? 'selected' : '' }}>
                                                                Video</option>
                                                            <option value="test"
                                                                {{ $detail->type == 'test' ? 'selected' : '' }}>
                                                                Test</option>
                                                            <option value="pdf"
                                                                {{ $detail->type == 'pdf' ? 'selected' : '' }}>
                                                                PDF</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Details</label>
                                                        <textarea name="details[]" class="form-control">{{ $detail->details }}</textarea>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>



                                    <!-- Add Section Button -->
                                    <button type="button" class="btn btn-warning" id="addSection">Add Section</button>

                                    <!-- Submit Button -->
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('course-js')
    <script>
        document.getElementById('addSection').addEventListener('click', function() {
            const container = document.getElementById('sectionContainer');
            const sectionCount = container.querySelectorAll('.section-template').length; // Count existing sections
            const template = `
        <div class="section-template">
            <div class="mb-3">
            <label for="">Section Name</label>
            <input type="text" name="name_new[]" class="form-control" required />
        </div>
        <div class="mb-3">
            <label for="">Section Title</label>
            <input type="text" name="section_title_new[]" class="form-control" required />
        </div>
        <div class="mb-3">
            <label for="">Section URL</label>
            <input type="url" name="url_new[]" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="">Section Type</label>
            <select name="type_new[]" class="form-control" required>
                <option value="">Select Type</option>
                <option value="video">Video</option>
                <option value="test">Test</option>
                <option value="pdf">PDF</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="">Details</label>
            <textarea name="details_new[]" class="form-control" placeholder="Enter section details"></textarea>
        </div>
            <button type="button" class="btn btn-danger removeSectionBtn">Remove Section</button>
        </div>
    `;
            container.insertAdjacentHTML('beforeend', template);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('removeSectionBtn')) {
                e.target.parentElement.remove();
            }
        });
    </script>
@endpush
