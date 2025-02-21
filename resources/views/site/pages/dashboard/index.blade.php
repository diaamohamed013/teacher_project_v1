@extends('site.master')

@section('title', 'Dashboard')
@section('css')
    <style>
        .teacherHeader {
            padding: 15rem 2rem;
        }

        .apexcharts-toolbar {
            display: none !important;
        }
    </style>
@endsection
@section('content')
    <x-header title="لوحة التحكم"></x-header>
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content px-0 dashTeacher" style="background: #f5f7fd;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">
                                                عدد الطلاب
                                            </p>
                                            <h4 class="card-title">
                                                {{ $studentsCount }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-info bubble-shadow-small">
                                            <i class="fa-solid fa-photo-film"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">
                                                عدد الكورسات
                                            </p>
                                            <h4 class="card-title">
                                                {{ $coursesCount }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="fa-solid fa-clipboard"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">
                                                عدد الاقسام
                                            </p>
                                            <h4 class="card-title">
                                                {{ $sectionsCount }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-round">
                            <div class="card-body">
                                <div class="card-head-row">
                                    <h3>
                                        User Statistics
                                    </h3>
                                </div>
                            </div>
                            <div id="myChartLegend"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-round">
                            <div class="card-head-row card-tools-still-right">
                                <div class="card-body">
                                    <h3 class="mb-4">Transaction History</h3>
                                    <div class="table-responsive">
                                        <!-- Projects table -->
                                        <table class="table align-items-center mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Payment Number</th>
                                                    <th scope="col" class="text-end">Date & Time</th>
                                                    <th scope="col" class="text-end">Amount</th>
                                                    <th scope="col" class="text-end">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <button class="btn btn-icon rounded-pill btn-success btn-sm ml-2">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        Payment from #10231
                                                    </th>
                                                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                                    <td class="text-end">$250.00</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-success">Completed</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <button class="btn btn-icon rounded-pill btn-success btn-sm ml-2">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        Payment from #10231
                                                    </th>
                                                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                                    <td class="text-end">$250.00</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-success">Completed</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <button class="btn btn-icon rounded-pill btn-success btn-sm ml-2">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        Payment from #10231
                                                    </th>
                                                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                                    <td class="text-end">$250.00</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-success">Completed</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <button class="btn btn-icon rounded-pill btn-success btn-sm ml-2">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        Payment from #10231
                                                    </th>
                                                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                                    <td class="text-end">$250.00</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-success">Completed</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <button class="btn btn-icon rounded-pill btn-success btn-sm ml-2">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        Payment from #10231
                                                    </th>
                                                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                                    <td class="text-end">$250.00</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-success">Completed</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <button class="btn btn-icon rounded-pill btn-success btn-sm ml-2">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        Payment from #10231
                                                    </th>
                                                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                                    <td class="text-end">$250.00</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-success">Completed</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <button class="btn btn-icon rounded-pill btn-success btn-sm ml-2">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        Payment from #10231
                                                    </th>
                                                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                                    <td class="text-end">$250.00</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-success">Completed</span>
                                                    </td>
                                                </tr>
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
@push('course-js')
    <script src="{{ asset('js/apexcharts.min.js') }}"></script>
    <script>
        var options = {
            series: [{
                name: 'series1',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'series2',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            toolbar: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z",
                    "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                    "2018-09-19T06:30:00.000Z"
                ]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#myChartLegend"), options);
        chart.render();
    </script>
@endpush
