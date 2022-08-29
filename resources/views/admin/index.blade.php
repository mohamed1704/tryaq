@extends('layouts.admin')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> لوحة التحكم</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>عدد المرضى
                    </h4>
                    <p><b>{{ $users }} {{ Auth::guard('admin')->user()->name ?? '' }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-user-md fa-3x"></i>
                <div class="info">
                    <h4>عدد الأطباء
                    </h4>
                    <p><b>{{ $doctors }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-medkit fa-3x"></i>
                <div class="info">
                    <h4>الخدمات</h4>
                    <p><b>{{ $service }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>التحاليل</h4>
                    <p><b>{{ $dia }}</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile" style="overflow-y:auto; max-height: 474.5px">
                <h3 class="tile-title"> الحالات {{ $ca }} حالة</h3>
                <p class="tile-title"></p>
                <table class="table table-hover table-bordered w-100" id="sampleTable" style="">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>اسم الطبيب</th>
                            <th>الخدمة</th>
                            <th>اليوم</th>
                            <th>الوقت</th>
                            <th>الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($cases as $cas)
                            <tr>
                                <th>
                                    {{ $cas->id }}
                                </th>
                                <th>
                                    {{ $cas->patient_name }}
                                </th>
                                <th>
                                    {{ $cas->doctor_name }}
                                </th>
                                <th>
                                    {{ $cas->service_name }}
                                </th>
                                <th>
                                    {{ $cas->add_day }}
                                </th>
                                <th>
                                    {{ $cas->add_time }}
                                </th>
                                <th>
                                    <div style="display: row" class="row">
                                        <form action="{{ route('emergency.destroy', $cas->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-lg fa-trash"></i></button>
                                        </form>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6" style="max-height: 380px">
            <div class="tile">
                <h3 class="tile-title">خدمات القسم شهريا</h3>
                <figure style="max-height: 370px" class="highcharts-figure">
                    <div style="max-height: 370px" id="container"></div>

                </figure>
            </div>
        </div>
    </div>

    </div>
@endsection
@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'طب الاسنان',
                    y: 61.41,
                    sliced: true,
                    selected: true
                }, {
                    name: 'قسم العيادات التخصصية',
                    y: 11.84
                }, {
                    name: 'قسم العمليات الصغرى',
                    y: 10.85
                }, {
                    name: 'قسم المختبرات الطبية',
                    y: 4.67
                }, {
                    name: 'قسم النساء والولادة',
                    y: 4.18
                }, {
                    name: 'قسم امراض الجلدية',
                    y: 7.05
                }]
            }]
        });
    </script>
@endsection
@section('style')
    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 660px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>
@endsection
