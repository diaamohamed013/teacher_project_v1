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
    <x-header title="تعديل الصف الدراسي"></x-header>

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
                                    Edit Grade
                                    <a href="{{ route('grades.index') }}" class="btn btn-danger" style="font-size: 16px;">
                                        Back
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('grades.update', $grade->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="">Grade Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $grade->name }}" />
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary saveBtn">Update</button>
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
