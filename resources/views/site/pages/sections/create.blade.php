@extends('site.master')

@section('title', 'تفاصيل كورس')

@section('content')
    <x-header title=" تفاصيل {{ $course->title }}"></x-header>

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content px-0">
            <div class="container">
                <div class="row">
                    @if ($errors->any())
                        <ul class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="col-md-12">
                        <div class="card cardRound">
                            <div class="card-body">
                                <h4 class="d-flex justify-content-between align-items-center mb-5" style="font-size: 22px;">
                                    الاقسام الرئيسية
                                    <a href="{{ route('grades.index') }}" class="btn btn-danger" style="font-size: 16px;">
                                        العودة
                                    </a>
                                </h4>
                                <div class="row mx-0">
                                    <div class="col-lg-6 mb-4">
                                        @if ($course->sections->isNotEmpty())
                                            <h3 class="mb-3" style="font-size: 1.5rem;font-family: hala;">
                                                الأقسام الرئيسية
                                            </h3>
                                            <ul class="list-group">
                                                @foreach ($course->sections as $index => $section)
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <a data-toggle="collapse" id="sec_a_{{ $section->id }}"
                                                            href="#multiCollapse_{{ $section->id }}" role="button"
                                                            aria-expanded="@if ($index === 0) true @else false @endif"
                                                            aria-controls="multiCollapse_{{ $section->id }}">
                                                            {{ $section->name }}
                                                        </a>
                                                        <a class="change_name" sec_id="{{ $section->id }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <span
                                                            class="badge badge-primary badge-pill">{{ $section->sectionDetails?->count() }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <h3 class="mb-3" style="font-size: 1.5rem;font-family: hala;">لايوجد اقسام
                                            </h3>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <form action="{{ route('section.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <h3 class="mb-3" style="font-size: 1.5rem;font-family: hala;">إضافة قسم
                                                    جديد</h3>
                                                <input type="text" name="name" placeholder="الدرس الاول......"
                                                    class="form-control" />
                                                <input type="hidden" value="{{ $course->id }}" name="course_id"
                                                    class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary saveBtn">حفظ</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5 mb-4">
                        @foreach ($course->sections as $sec)
                            <div class="collapse multi-collapse" id="multiCollapse_{{ $sec->id }}">
                                <div class="card card-body cardRound">
                                    <div></div>
                                    <h3 class="mb-3 d-flex justify-content-between align-items-center"
                                        style="font-size: 1.5rem;font-family: hala;">
                                        {{ $sec->name }}
                                        <a href="{{ route('section_details.create', ['section_id' => $sec->id]) }}"
                                            class="btn btn-success">
                                            إضافة تفاصيل
                                        </a>
                                    </h3>
                                    <ul class="list-group">
                                        @foreach ($sec->sectionDetails as $index => $detail)
                                            <a href="{{ route('section_details.edit', $detail->id) }}"
                                                class="list-group-item list-group-item-action" aria-current="true">
                                                {{ $detail->section_title }} <i class="fa fa-edit"></i>
                                            </a>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('course-js')
    <script>
        let edit_section = $('a.change_name');
        let section_id = 0;
        let text = "";

        edit_section.on('click', function() {
            section_id = $(this).attr('sec_id');
            let section = $(`#sec_a_${section_id}`);
            text = section.text();

            let form = `<form action="/section/${section_id}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <h3 class="mb-3" style="font-size: 1.5rem;font-family: hala;">تعديل اسم قسم</h3>
                                <input type="text" name="name" value="${$.trim(text)}"  class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary saveBtn">تعديل</button>
                            </div>
                        </form>`;

            section.remove();
            $(this).after(form);
            $(this).remove();
        });
    </script>
@endpush
