@extends('site.master')

@section('title', 'Grades')
@section('css')
    <style>
        .teacherHeader {
            padding: 15rem 2rem;
        }
    </style>
@endsection
@section('content')
    <x-header title="الصفوف الدراسية"></x-header>
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content px-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <div class="card mt-3 cardRound">
                            <div class="card-body">
                                <h4 class="d-flex justify-content-between align-items-center mb-3" style="font-size: 22px;">
                                    الصفوف الدراسية
                                    <a href="{{ route('grades.create') }}" class="btn btn-primary py-3"
                                        style="font-size: 16px;">
                                        إضافة صف دراسي
                                    </a>
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped tableNoWrap">
                                        <thead>
                                            <tr>
                                                <th>رقم</th>
                                                <th>اسم الصف الدراسي</th>
                                                <th width="40%">الاجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($grades as $grade)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $grade->name }}</td>
                                                    <td>
                                                        <a href="{{ route('grades.edit', $grade->id) }}"
                                                            class="btn text-success tooltipIcon">
                                                            <i class="fa fa-edit"></i>
                                                            <span class="tooltiptext">تعديل</span>
                                                        </a>
                                                        <form action="{{ route('grades.destroy', $grade->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn text-danger tooltipIcon shadow-none"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fa fa-trash"></i>
                                                                <span class="tooltiptext">حذف</span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
