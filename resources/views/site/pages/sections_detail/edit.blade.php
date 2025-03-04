@extends('site.master')

@section('content')
    <x-header title=" تعديل تفاصيل قسم {{ $detail->section->name }} "></x-header>

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
                                    تعديل تفاصيل القسم
                                    <a href="{{ url()->previous() }}" class="btn btn-danger" style="font-size: 16px;">
                                        العودة
                                    </a>
                                </h4>
                                <form action="{{ route('section_details.update', $detail->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="section_id" value="{{$detail->section->id}}">
                                    <input type="hidden" name="course_id" value="{{$detail->section->course_id}}">
                                    <div class="row mx-0">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">عنوان القسم</label>
                                                <input type="text" name="section_title" value="{{$detail->section_title ?? old('section_title')}}" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">رابط القسم</label>
                                                <input type="url" name="url" class="form-control" value="{{$detail->url ?? old('url')}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="">نوع القسم</label>
                                                <select name="type" class="form-control" required>
                                                    <option value="">قم باختيار النوع</option>
                                                    <option @if($detail->type == 'video') selected @endif value="video">Video</option>
                                                    <option @if($detail->type == 'test') selected @endif value="test" value="test">Test</option>
                                                    <option @if($detail->type == 'pdf') selected @endif value="pdf" value="pdf">PDF</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="">تفاصيل القسم</label>
                                                <textarea name="details" class="form-control" placeholder="قم بادخال التفاصيل">{{$detail->details}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary saveBtn">تعديل</button>
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
