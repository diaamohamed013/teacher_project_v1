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
    <x-header title="تعديل بيانات الكورس"></x-header>

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content px-0">
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

                        <div class="card cardRound">
                            <div class="card-body">
                                <h4 class="d-flex justify-content-between align-items-center mb-3" style="font-size: 22px;">
                                    تعديل الكورس
                                    <a href="{{ route('courses.index') }}" class="btn btn-danger" style="font-size: 16px;">
                                        العودة
                                    </a>
                                </h4>
                                <form action="{{ route('courses.update', $course->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mx-0">
                                        <div class="col-md-6">
                                            <!-- Grade Dropdown -->
                                            <div class="mb-3">
                                                <label for="grade">الصف</label>
                                                <select name="grade_id" class="form-control">
                                                    @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}"
                                                            {{ $course->grade_id == $grade->id ? 'selected' : '' }}>
                                                            {{ $grade->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Course Details -->
                                            <div class="mb-3">
                                                <label for="title">عنوان الكورس</label>
                                                <input type="text" name="title" value="{{ $course->title }}"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sub_title">العنوان الثانوي</label>
                                                <input type="text" name="sub_title" value="{{ $course->sub_title }}"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="price">السعر</label>
                                                <input type="text" name="price" value="{{ $course->price }}"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sale_price">السعر بعد الخصم</label>
                                                <input type="text" name="sale_price" value="{{ $course->sale_price }}"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="video_url">رابط الفيديو</label>
                                                <input type="url" name="video_url" value="{{ $course->video_url }}"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="image">الصورة</label>
                                                <input type="file" name="image" class="form-control" />
                                                <small>الصورة الحالية: <img src="{{ asset($course->image) }}"
                                                        alt="{{$course->title}}" width="100"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="description">التفاصيل</label>
                                                <textarea name="description" class="form-control">{{ $course->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <!-- Submit Button -->
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary saveBtn">تعديل</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sections -->
                                    {{--                                    <h5>Sections</h5> --}}
                                    {{--                                    <div id="sectionContainer"> --}}
                                    {{--                                        @foreach ($course->sections as $section) --}}
                                    {{--                                            --}}{{-- @dd($section) --}}
                                    {{--                                            <div class="section-template"> --}}
                                    {{--                                                <div class="mb-3"> --}}
                                    {{--                                                    <label>Section Name</label> --}}
                                    {{--                                                    <input type="text" name="name[]" value="{{ $section->name }}" --}}
                                    {{--                                                        class="form-control" /> --}}
                                    {{--                                                    <input type="text" name="sectionId[]" value="{{ $section->id }}" --}}
                                    {{--                                                        hidden /> --}}
                                    {{--                                                </div> --}}

                                    {{--                                                @foreach ($section->sectionDetails as $detail) --}}
                                    {{--                                                    <div class="mb-3"> --}}
                                    {{--                                                        <label>Section Title</label> --}}
                                    {{--                                                        <input type="text" name="section_title[]" --}}
                                    {{--                                                            value="{{ $detail->section_title }}" class="form-control" /> --}}
                                    {{--                                                        <input type="text" name="detailsId[]" --}}
                                    {{--                                                            value="{{ $detail->id }}" hidden /> --}}
                                    {{--                                                    </div> --}}
                                    {{--                                                    <div class="mb-3"> --}}
                                    {{--                                                        <label>URL</label> --}}
                                    {{--                                                        <input type="url" name="url[]" value="{{ $detail->url }}" --}}
                                    {{--                                                            class="form-control" /> --}}
                                    {{--                                                    </div> --}}
                                    {{--                                                    <div class="mb-3"> --}}
                                    {{--                                                        <label>Type</label> --}}
                                    {{--                                                        <select name="type[]" class="form-control"> --}}
                                    {{--                                                            <option value="video" --}}
                                    {{--                                                                {{ $detail->type == 'video' ? 'selected' : '' }}> --}}
                                    {{--                                                                Video</option> --}}
                                    {{--                                                            <option value="test" --}}
                                    {{--                                                                {{ $detail->type == 'test' ? 'selected' : '' }}> --}}
                                    {{--                                                                Test</option> --}}
                                    {{--                                                            <option value="pdf" --}}
                                    {{--                                                                {{ $detail->type == 'pdf' ? 'selected' : '' }}> --}}
                                    {{--                                                                PDF</option> --}}
                                    {{--                                                        </select> --}}
                                    {{--                                                    </div> --}}
                                    {{--                                                    <div class="mb-3"> --}}
                                    {{--                                                        <label>Details</label> --}}
                                    {{--                                                        <textarea name="details[]" class="form-control">{{ $detail->details }}</textarea> --}}
                                    {{--                                                    </div> --}}
                                    {{--                                                @endforeach --}}
                                    {{--                                            </div> --}}
                                    {{--                                        @endforeach --}}
                                    {{--                                    </div> --}}



                                    <!-- Add Section Button -->
                                    {{--                                    <button type="button" class="btn btn-warning" id="addSection">Add Section</button> --}}


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
            <label for="">اسم القسم</label>
            <input type="text" name="name_new[]" class="form-control" required />
        </div>
        <div class="mb-3">
            <label for="">عنوان القسم</label>
            <input type="text" name="section_title_new[]" class="form-control" required />
        </div>
        <div class="mb-3">
            <label for="">رابط القسم</label>
            <input type="url" name="url_new[]" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="">نوع القسم</label>
            <select name="type_new[]" class="form-control" required>
                <option value="">قم باختيار النوع</option>
                <option value="video">Video</option>
                <option value="test">Test</option>
                <option value="pdf">PDF</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="">تفاصيل القسم</label>
            <textarea name="details_new[]" class="form-control" placeholder="قم بادخال التفاصيل"></textarea>
        </div>
            <button type="button" class="btn btn-danger removeSectionBtn">حذف القسم</button>
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
