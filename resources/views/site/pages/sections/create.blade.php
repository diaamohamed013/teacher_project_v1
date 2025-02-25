@extends('site.master')

@section('title', 'تفاصيل كورس')

@section('content')
    <x-header title=" تفاصيل {{$course->title}}"></x-header>

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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-flex justify-content-between align-items-center" style="font-size: 22px;">
                                    الاقسام الرئيسية
                                    <a href="{{ route('grades.index') }}" class="btn btn-danger" style="font-size: 16px;">
                                        Back
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        @if($course->sections->isNotEmpty())
                                            <ul class="list-group">
                                                @foreach($course->sections as $index => $section)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <a data-toggle="collapse"
                                                           href="#multiCollapse_{{$section->id}}"
                                                           role="button"
                                                           aria-expanded="@if($index === 0) true @else false @endif"
                                                           aria-controls="multiCollapse_{{$section->id}}">
                                                            {{$section->name}}
                                                        </a>
                                                        <span class="badge badge-primary badge-pill">{{$section->sectionDetails?->count()}}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <h3 class="mb-3" style="font-size: 1.5rem;font-family: hala;">لايوجد اقسام</h3>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <form action="{{ route('section.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <h3 class="mb-3" style="font-size: 1.5rem;font-family: hala;">إضافة قسم جديد</h3>
                                                <input type="text" name="name" placeholder="الدرس الاول......" class="form-control" />
                                                <input type="hidden" value="{{$course->id}}" name="course_id" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary saveBtn">إضافة</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        @foreach($course->sections as $sec)
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapse_{{$sec->id}}">
                                    <div class="card card-body">
                                        <div></div>
                                        <h3 class="mb-3 d-flex justify-content-between align-items-center" style="font-size: 1.5rem;font-family: hala;">
                                            {{$sec->name}}
                                            <a href="{{ route('section_details.create',['section_id'=>$sec->id]) }}" class="btn btn-success" >
                                                create detail
                                            </a>
                                        </h3>
                                        <ul class="list-group">
                                            @foreach($sec->sectionDetails as $index => $detail)
                                                <a href="{{ route('section_details.edit', $detail->id) }}"
                                                   class="list-group-item list-group-item-action"
                                                   aria-current="true">
                                                    {{$detail->section_title}} <i class="fa fa-edit"></i>
                                                </a>

                                            @endforeach
                                        </ul>
                                    </div>
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
