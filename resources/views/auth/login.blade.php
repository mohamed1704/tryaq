@extends('website.parent')
@section('styles')

@endsection
@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">تسجيل دخول</h4>

                        <form action="{{ route('admin.login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Username or email</label>
                                <input name="id" type="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password">
                            </div>
                            <div class="check-and-pass">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1">
                                                <label class="form-check-label">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button">
                                <a href="{{ route('admin.index') }}" type="submit"  class="btn">Login Now</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
