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
                                                    <th scope="col">فاتورة رقم</th>
                                                    <th scope="col" class="text-end">تاريخ انشاء العملية</th>
                                                    <th scope="col" class="text-end">المبلغ</th>
                                                    <th scope="col" class="text-end">الحالة</th>
                                                    <th scope="col" class="text-end">تاريخ الدفع</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($payments as $payment)
                                                    <tr>
                                                        <th scope="row">
                                                            @if($payment->paid)
                                                                <button class="btn btn-icon rounded-pill btn-success btn-sm ml-2">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                                #{{$payment->invoice_id}}
                                                            @else
                                                                <button class="btn btn-icon rounded-pill btn-danger btn-sm ml-2">
                                                                    <i class="fa fa-info"></i>
                                                                </button>
                                                                #{{$payment->invoice_id}}
                                                            @endif
                                                        </th>
                                                        <td class="text-end">
                                                            {{Date_format_($payment->created_at)}}
                                                        </td>
                                                        <td class="text-end">
                                                            {{$payment->total}}
                                                           ج.م
                                                        </td>
                                                        <td class="text-end">
                                                            @if($payment->paid)
                                                                <span class="badge badge-success">مكتمل</span>
                                                            @else
                                                                <span class="badge badge-warning">غير مكتمل</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-end">
                                                            @isset($payment->paid_at)
                                                                {{Date_format_($payment->paid_at)}}
                                                            @endif
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
