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
                                    Create New Course
                                    <a href="{{ route('courses.index') }}" class="btn btn-danger" style="font-size: 16px;">
                                        Back
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="grade_id">Grade</label>
                                        <select name="grade_id" id="grade_id" class="form-control" required>
                                            <option value="" disabled selected>Select Grade</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Course Title</label>
                                        <input type="text" name="title" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Sub Title</label>
                                        <input type="text" name="sub_title" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Price</label>
                                        <input type="number" name="price" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Sale Price</label>
                                        <input type="number" name="sale_price" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Video URL</label>
                                        <input type="url" name="video_url" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Course Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image"
                                                    name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Description</label>
                                        <textarea placeholder="Description" name="description" class="form-control"></textarea>
                                    </div>
                                    <button class="btn btn-warning sectionBtn" type="button">Add Section Data</button>
                                    <div id="sectionContainer">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
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
    <script id="sectionTemplate" type="text/x-template">
    <div class="section-item mb-3">
        <hr>
        <div class="mb-3">
            <label for="">Section Name</label>
            <input type="text" name="name[]" class="form-control" required />
        </div>
        <div class="mb-3">
            <label for="">Section Title</label>
            <input type="text" name="section_title[]" class="form-control" required />
        </div>
        <div class="mb-3">
            <label for="">Section URL</label>
            <input type="url" name="url[]" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="">Section Type</label>
            <select name="type[]" class="form-control" required>
                <option value="">Select Type</option>
                <option value="video">Video</option>
                <option value="test">Test</option>
                <option value="pdf">PDF</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="">Details</label>
            <textarea name="details[]" class="form-control" placeholder="Enter section details"></textarea>
        </div>
        <!-- Remove Section Button -->
        <button type="button" class="btn btn-danger removeSectionBtn">Remove Section</button>
    </div>
</script>

    <script>
        // Function to add a new section when the button is clicked
        document.querySelector('.sectionBtn').addEventListener('click', function() {
            // Get the section template
            var template = document.getElementById('sectionTemplate').innerHTML;
            // Create a new section and append it to the section container
            document.getElementById('sectionContainer').insertAdjacentHTML('beforeend', template);
        });

        // Function to remove a section
        document.getElementById('sectionContainer').addEventListener('click', function(event) {
            if (event.target.classList.contains('removeSectionBtn')) {
                event.target.closest('.section-item').remove();
            }
        });
    </script>
@endpush
