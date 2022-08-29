@extends('layouts.admin')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-laptop"></i>جدول الخدمات</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">لوحة التحكم</li>
            <li class="breadcrumb-item active"><a href="#">الخدمات</a></li>
        </ul>
    </div>
    <div class="col-md-12">


        <div class="tile">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="tile-body">
                <div class="col-md-12 p-2 m-2 row ">
                    <div class="col-md-6 justify-content-end align-items-center">
                        <h5 class="h5"><i class="fa fa-table"></i><strong>جدول الخدمات</strong></h5>
                    </div>
                    <div class="row col-md-6 justify-content-end">
                        <a style="height: 30px; width:130px;" href="{{ route('service.create') }}"
                            class="btn btn-primary d-flex justify-content-center align-items-center ml-1"><i
                                class="fa fa-plus "></i><small>اضافة خدمة</small></a>
                    </div>


                </div>
                {{-- <input style="width: 100%; padding:5px ; margin-bottom:5px;" type="text" name="search"
                    placeholder="Search..."> --}}

                <div class="table-responsive">

                    <table class="table table-hover table-bordered w-100" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الخدمة</th>
                                <th>السعر</th>
                                <th>الأقسام</th>
                                <th>الخيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($service as $ser)
                                <tr>
                                    <th>{{ $ser->id }}</th>
                                    <th>{{ $ser->name }}</th>
                                    {{-- <th>{{ $ser->status }}</th> --}}
                                    <th>{{ $ser->price }}</th>
                                    <th>
                                        @foreach ($dep as $d)
                                            @if ($d->id == $ser->department_id)
                                                {{ $d->name }}
                                            @endif
                                        @endforeach
                                    </th>
                                    <th>
                                        <div style="display: row" class="row">

                                            <a href="{{ route('service.edit', $ser->id) }}" class="btn btn-info"><i
                                                    class="fa fa-lg fa-edit"></i></a>
                                            <form action="{{ route('service.destroy', $ser->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fa fa-lg fa-trash"></i></button>
                                            </form>
                                            <div>
                                                <div class="toggle lg">
                                                    <label>
                                                        <input name="status" type="checkbox" checked
                                                            value="{{ $ser->status == 1 ? '1' : '0' }}"><span
                                                            class="button-indecator"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
    {{-- <script type="text/javascript">$('#sampleTable').DataTable();</script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
