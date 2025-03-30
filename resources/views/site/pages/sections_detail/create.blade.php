@extends('site.master')

@section('content')
    <x-header title=" إضافة تفاصيل لقسم {{ $section->name }} "></x-header>

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
                                <h4 class="d-flex justify-content-between align-items-center" style="font-size: 22px;">
                                    إضافة تفاصيل القسم
                                    <a href="{{ url()->previous() }}" class="btn btn-danger" style="font-size: 16px;">
                                        العودة
                                    </a>
                                </h4>
                                <form action="{{ route('section_details.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="section_id" value="{{ $section->id }}">
                                    <input type="hidden" name="course_id" value="{{ $section->course_id }}">
                                    <div class="row mx-0">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">عنوان القسم</label>
                                                <input type="text" name="section_title"
                                                    value="{{ old('section_title') }}" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">رابط القسم</label>
                                                <input type="url" name="url" class="form-control"
                                                    value="{{ old('url') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">نوع القسم</label>
                                                <select name="type" class="form-control" required>
                                                    <option value="">قم باختيار النوع</option>
                                                    <option value="video">Video</option>
                                                    <option value="test" value="test">Test</option>
                                                    <option value="pdf" value="pdf">PDF</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="">تفاصيل القسم</label>
                                                <textarea name="details" class="form-control" placeholder="قم بادخال التفاصيل"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
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
