@extends('site.master')

@section('title', 'Students')
@section('css')
    <style>
        .teacherHeader {
            padding: 15rem 2rem;
        }
    </style>
@endsection
@section('content')
    <x-header title="جميع الطلاب"></x-header>
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
                                    Students
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped tableNoWrap">
                                        <thead>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Student Name</th>
                                                <th>Student Email</th>
                                                <th>Student Phone</th>
                                                <th>Parent Phone</th>
                                                <th>Student City</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $student)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $student->user->name }}</td>
                                                    <td>{{ $student->user->email }}</td>
                                                    <td>{{ $student->phone }}</td>
                                                    <td>{{ $student->parent_phone }}</td>
                                                    <td>{{ $student->city }}</td>
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
