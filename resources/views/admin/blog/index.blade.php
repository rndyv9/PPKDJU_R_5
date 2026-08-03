@extends('layouts.admin_template')

@section('title', 'Data Blog')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="font-weight-bold">{{$title ?? ''}}</h6>
                    </div>
                    <div class="card-body">
                        <div align='right' class="mb-3">
                            <a href="{{ route('blog.create') }}" class="btn btn-primary">Create New Blog</a>
                        </div>
                        <table class="table table-bordered table-striped tblack" style="color: #000 !important;">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $index => $blog)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->content }}</td>
                                    <td><img width="100" src="{{ asset('storage/' . $blog->photo) }}" alt=""></td>
                                    <td>{{ $blog->is_active }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm mx-1" href="{{ route('blog.edit', $blog->id) }}">Edit</a>
                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Data akan dihapus?')" class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
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
@endsection
