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
            <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
                <div class="info">
                    <h4>عدد الأطباء
                    </h4>
                    <p><b>{{ $doctors }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>الخدمات</h4>
                    <p><b>{{ $service }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>التحاليل</h4>
                    <p><b>{{ $dia }}</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" >
            <div class="tile" style="overflow-y:auto; max-height: 355px">
                <h3 class="tile-title">الحالات </h3>
                {{-- <div class="embed-responsive embed-responsive-16by9"> --}}
                {{-- <canvas class="embed-responsive-item" id="lineChartDemo"></canvas> --}}
                <table class="table table-hover table-bordered w-100" id="sampleTable" style="">
                    <thead>
                        <tr>
                            <th>#</th>

                            <th>الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($cases as $emer)
                            <tr>{{ $emer->name }}</tr>
                        @endforeach --}}
                        @foreach ($cases as $cas)
                            <tr>
                                <th>
                                    {{ $cas->id }}
                                </th>
                                <th>
                                    <div style="display: row" class="row">

                                        <a href="{{ route('emergency.edit', $cas->id) }}" class="btn btn-info"><i
                                                class="fa fa-lg fa-edit"></i></a>
                                        <form action="{{ route('emergency.destroy', $cas->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-lg fa-trash"></i></button>
                                        </form>
                                        <div>
                                            <div class="toggle lg">
                                                <label>
                                                    <input name="status" type="checkbox" checked
                                                        value="{{ $cas->status == 1 ? '1' : '0' }}"><span
                                                        class="button-indecator"></span>
                                                </label>
                                            </div>
                                        </div>
                            </tr>
            </div>
            </th>
            </tr>
            @endforeach


            </tbody>
            </table>

            {{-- </div> --}}
        </div>
    </div>
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">المشاهدات</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var data = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [{
                        {
                            --$users--
                        }
                    }, {
                        {
                            --$posts--
                        }
                    }, 40, 19, 86]
                }
            ]
        };
        var pdata = [{
                value: 300,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Complete"
            },
            {
                value: 50,
                color: "#F7464A",
                highlight: "#FF5A5E",
                label: "In-Progress"
            }
        ]

        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxp = $("#pieChartDemo").get(0).getContext("2d");
        var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
@endsection
