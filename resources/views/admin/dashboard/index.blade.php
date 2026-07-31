@extends('layouts.admin_template')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h6>{{ $title ?? '' }}</h6>
            </div>
            @if (session('role') === 'Admin')
            </a><a href="{{ route('user') }}" class="col-md-4">
                    <div class="card text-white text-center bg-primary pt-3 mb-3">
                        <i class="fas fa-user fa-3x"></i>
                        <div class="card-body">
                            <h5 class="card-title">User Management</h5>
                        </div>
                    </div>
                </a>
                <a href="{{ route('student') }}" class="col-md-4">
                    <div class="card text-white text-center bg-primary pt-3 mb-3">
                        <i class="fas fa-user-graduate fa-3x"></i>
                        <div class="card-body">
                            <h5 class="card-title">Student Management</h5>
                        </div>
                    </div>
            @endif
            <a href="{{ route('blog.index') }}" class="col-md-4">
                <div class="card text-white text-center bg-primary pt-3 mb-3">
                    <i class="fab fa-blogger fa-3x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Blog Management</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
