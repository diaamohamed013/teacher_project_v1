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

                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-flex justify-content-between align-items-center" style="font-size: 22px;">
                                    add Details
                                    <a href="{{ url()->previous() }}" class="btn btn-danger" style="font-size: 16px;">
                                        Back
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('section_details.store' )}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="section_id" value="{{$section->id}}">
                                    <input type="hidden" name="course_id" value="{{$section->course_id}}">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Section Title</label>
                                            <input type="text" name="section_title" value="{{old('section_title')}}" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Section URL</label>
                                            <input type="url" name="url" class="form-control" value="{{old('url')}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Section Type</label>
                                            <select name="type" class="form-control" required>
                                                <option value="">Select Type</option>
                                                <option value="video">Video</option>
                                                <option value="test" value="test">Test</option>
                                                <option value="pdf" value="pdf">PDF</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="">Details</label>
                                            <textarea name="details" class="form-control" placeholder="Enter section details">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary saveBtn">create</button>
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
