@extends('Dashboard::frontend.default.master')

@section('body_class', 'infographic')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div id="main-content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="primary" class="text-center">
                    <h1 class="post-title">Not Found!</h1>
                    <div class="post-content">
                        <a href="{{ route('home') }}">Back to Home</a>
                    </div>
                </div><!-- #primary-->
            </div><!-- #main-content -->
        </div>
    </div>
@endsection
