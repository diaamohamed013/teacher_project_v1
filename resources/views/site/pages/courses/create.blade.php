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
    <x-header title="إضافة كورس جديد"></x-header>

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
                                    إضافة كورس جديد
                                    <a href="{{ route('courses.index') }}" class="btn btn-danger" style="font-size: 16px;">
                                        العودة
                                    </a>
                                </h4>
                                <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mx-0">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="grade_id">الصف</label>
                                                <select name="grade_id" id="grade_id" class="form-control" required>
                                                    <option value="" disabled selected>قم باختيار الصف</option>
                                                    @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">عنوان الكورس</label>
                                                <input type="text" name="title" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">العنوان الثانوي</label>
                                                <input type="text" name="sub_title" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">السعر</label>
                                                <input type="number" name="price" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">السعر بعد الخصم</label>
                                                <input type="number" name="sale_price" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">رابط الفيديو</label>
                                                <input type="url" name="video_url" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="">الصورة</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image"
                                                            name="image">
                                                        <label class="custom-file-label" for="image">اختر ملف</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="">التفاصيل</label>
                                                <textarea placeholder="التفاصيل" name="description" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        {{--                                        <div class="col-md-12 text-center"> --}}
                                        {{--                                            <button class="btn btn-warning rounded-pill sectionBtn saveBtn tooltipIcon" type="button"> --}}
                                        {{--                                                <i class="fa fa-plus"></i> --}}
                                        {{--                                                <span class="tooltiptext">Add Section data</span> --}}
                                        {{--                                            </button> --}}
                                        {{--                                        </div> --}}

                                        <div class="col-md-12 px-0">
                                            <div id="sectionContainer">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="my-5">
                                                <button type="submit" class="btn btn-primary saveBtn">حفظ</button>
                                            </div>
                                        </div>
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
        <div class="section-item mt-3">
            <div class="row mx-0">
            <hr>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="">عنوان القسم</label>
                    <input type="text" name="section_title[]" class="form-control" required />
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="">رابط القسم</label>
                    <input type="url" name="url[]" class="form-control" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="">نوع القسم</label>
                    <select name="type[]" class="form-control" required>
                        <option value="">قم باختيار النوع</option>
                        <option value="video">Video</option>
                        <option value="test">Test</option>
                        <option value="pdf">PDF</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="">تفاصيل القسم</label>
                    <textarea name="details[]" class="form-control" placeholder="قم بادخال التفاصيل"></textarea>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <!-- Remove Section Button -->
                <button type="button" class="btn btn-danger rounded-pill removeSectionBtn tooltipIcon shadow-none">
                    <i class="fa fa-trash"></i>
                    <span class="tooltiptext">حذف القسم</span>
                </button>
            </div>
        </div>
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
