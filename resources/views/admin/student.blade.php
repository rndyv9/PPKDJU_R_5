@extends('layouts.admin_template')

@section('title', $title)

@section('content')
    <div class="col-12">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between mb-1">
                    <h1><i class="fas fa-user-graduate"></i> Student Management</h1>
                    <a class="btn btn-primary btn-sm" href="#AddPart" data-toggle="modal" data-target="#AddPart">Tambah Data</a>
                </div>
                <div class="col-lg-12">
                    <table id="student" class="table table-bordered table-striped tblack" style="color: #000 !important;">
                        <thead class="bg-white">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $index => $student)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm mx-1" href="#EditPart{{ $student->id }}"
                                            data-toggle="modal" data-target="#EditPart{{ $student->id }}">Edit</a>
                                        <a class="btn btn-danger btn-sm mx-1"
                                            href="{{ route('student.hapus', $student->id) }}"
                                            onclick="return confirm('Data akan dihapus?')">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mb-3">
                        {{ $students->links() }}
                    </div>
                    {{-- Add Part --}}
                    <div class="modal fade" id="AddPart" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="myModalLabel">Add Data</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        {{-- <i class="fas fa-times"></i> --}}
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" enctype="multipart/form-data" method="post"
                                        action="{{ route('student.simpan') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <fieldset class="form-group">
                                                    <label class="form-label">Name</label>
                                                    <input name="name" type="text" class="form-control"
                                                        placeholder="John Doe">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input name="email" type="email" class="form-control"
                                                        placeholder="Email address">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label class="form-label">Phone</label>
                                                    <input name="phone" type="tel" class="form-control"
                                                        placeholder=" Phone number">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label class="form-label">Address</label>
                                                    <textarea name="address" class="form-control" placeholder="Address"></textarea>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {{-- <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button> --}}
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Edit Sparepart --}}
                    @foreach ($students as $item)
                        <div class="modal fade" id="EditPart{{ $item->id }}" role="dialog" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Edit Data</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post"
                                            action="{{ route('student.update', $item->id) }}">
                                            @csrf
                                            <div class="row">
                                                <input name="id" type="hidden" value="{{ $item->id }}"
                                                    class="form-control" readonly>
                                                <div class="col-12">
                                                    <fieldset class="form-group">
                                                        <label class="form-label">Name</label>
                                                        <input name="name" type="text" class="form-control"
                                                            placeholder="John Doe" value="{{ $item->name }}">
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input name="email" type="email" class="form-control"
                                                            placeholder="Email address" value="{{ $item->email }}">
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label class="form-label">Phone</label>
                                                        <input name="phone" type="tel" class="form-control"
                                                            placeholder=" Phone number" value="{{ $item->phone }}">
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <textarea name="address" class="form-control" placeholder="Address">{{ $item->address }}</textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                {{-- <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button> --}}
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
