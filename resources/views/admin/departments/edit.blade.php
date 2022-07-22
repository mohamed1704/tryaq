@extends('layouts.admin')

@section('content')

  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>الاقسام </h1>
      
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">لوحة التحكم</li>
      <li class="breadcrumb-item active"><a href="#">الاقسام</a></li>
      <li class="breadcrumb-item active"><a href="#">تعديل</a></li>
    </ul>
  </div>
  <div class="col-md-12">
       
        
    <div class="tile">
      @if (Session::has('message'))
      <div class="alert alert-success" role="alert">
       {{Session::get('message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div> 
      @endif
      <div class="tile-body">
        <div  class="col-md-12 p-2 m-2 row ">
          <div class="col-md-6 justify-content-start align-items-center">
            <h5 class="h5"><i class="fa fa-table"></i><strong> الاقسام </strong></h5>
          </div>  
        </div>

      </div>
      <form method="POST" action="{{route('categories.update',$category->id)}}">
          @csrf
          @method('put')
        @include('admin.categories._form' , ['button'=> 'Update'])
      </form>
    </div>
  </div>

 

    
   
@endsection