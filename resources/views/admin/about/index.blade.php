@extends('layouts.admin_template')

@section('title', 'Data Blog')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="font-weight-bold">{{ $title ?? '' }}</h6>
                    </div>
                    <div class="card-body">
                        <div align='right' class="mb-3">
                            <a href="{{ route('blog.create') }}" class="btn btn-primary">Create New Blog</a>
                        </div>
                        <table class="table table-bordered table-striped tblack" style="color: #000 !important;">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Birthday</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Telp</th>
                                    <th>Postal_code</th>
                                    <th>Description</th>
                                    <th>Github</th>
                                    <th>Linkedin</th>
                                    <th>Porto</th>
                                    <th>File</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $index => $about)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $about->name }}</td>
                                        <td>{{ $about->birthday->format('d F') }}</td>
                                        <td>{{ $about->email }}</td>
                                        <td>{{ $about->address }}</td>
                                        <td>{{ $about->telp }}</td>
                                        <td>{{ $about->postal_code }}</td>
                                        <td>{{ $about->description }}</td>
                                        <td>{{ $about->github }}</td>
                                        <td>{{ $about->linkedin }}</td>
                                        <td>{{ $about->porto }}</td>
                                        <td>{{ $about->file }}</td>
                                        <td>{{ $about->is_active }}</td>
                                        {{-- <td><img width="100" src="{{ asset('storage/' . $blog->photo) }}"
                                                alt=""></td> --}}
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-sm mx-1"
                                                href="{{ route('blog.edit', $about->id) }}">Edit</a>
                                            <form action="{{ route('blog.destroy', $about->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Data akan dihapus?')"
                                                    class="btn btn-danger btn-sm" type="submit">Delete</button>
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
