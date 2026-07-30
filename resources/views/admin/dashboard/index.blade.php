@extends('layouts.admin_template')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h6>{{ $title ?? '' }}</h6>
                @if (session('role') === 'admin')
                    <a href="{{ route('student') }}" class="col-md-4">
                        <div class="card text-white text-center bg-primary pt-3 mb-3">
                            <i class="fas fa-user-graduate fa-3x"></i>
                            <div class="card-body">
                                <h5 class="card-title">Student Management</h5>
                            </div>
                        </div>
                    </a>
                @endif
                <a href="{{ route('blog.index') }}" class="col-md4">
                    <div class="card text-white text-center bg-primary pt-3 mb-3">
                        <i class="fas fa-blog fa-3x"></i>
                        <div class="card-body">
                            <h5 class="card-title">Blog Management</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
