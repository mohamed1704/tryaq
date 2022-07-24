@extends('layouts.admin')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-laptop"></i> الإعلانات</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">لوحة التحكم</li>
            <li class="breadcrumb-item active"><a href="#">الإعلانات</a></li>
        </ul>

        <div>
            <a href="{{ route('ads.create') }}" class="btn btn-primary"> اضافة عرض جديد</a>
        </div>
    </div>
    <div class="col-md-12">


        <div class="row">

            @foreach ($ads as $offer)
                <div class="col-md-6">
                    <div class="tile">

                        <div class="tile-title-w-btn">

                            <img class="" style="height:150px ; width:100%; object-fit: cover"
                                src="{{ asset('storage/' . $offer->image) }}">



                        </div>
                        <hr>
                        <div class="tile-body">
                            <div class="row" style="display: flex; justify-content:space-between">
                                <h3 class="title">{{ $offer->title }}</h3>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="#"><i class="fa fa-lg fa-edit"></i></a>
                                    <form action="{{route('ads.destroy', $offer->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" href="#"><i class="fa fa-lg fa-trash"></i></button>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <hr>
                        <div class="tile-body container">
                            <div class="row">



                            </div>

                        </div>





                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script> --}}
@endsection
