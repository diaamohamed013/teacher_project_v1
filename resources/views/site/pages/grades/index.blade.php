@extends('site.master')

@section('title', 'Grades')


@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="d-flex justify-content-between align-items-center" style="font-size: 22px;">
                                    Grades
                                    <a href="{{ route('grades.create') }}" class="btn btn-primary py-3" style="font-size: 16px;">
                                        Add New Grade
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th width="40%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($grades as $grade)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $grade->name }}</td>
                                                <td>
                                                    <a href="{{ route('grades.edit', $grade->id) }}"
                                                        class="btn text-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <!-- <a href=""
                                                                class="btn btn-danger mx-2">Delete</a> -->
                                                    <form action="{{ route('grades.destroy', $grade->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn text-danger">
                                                            <i class="fa fa-trash"></i>
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
        </section>
        <!-- /.content -->
    </div>
@endsection
