@extends('layouts.admin_template')

@section('title', $title)

@section('content')
    <div class="col-12">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between mb-1">
                    <h1><i class="fas fa-user-graduate"></i> User Management</h1>
                </div>
                <div class="col-lg-12">
                    <table id="user" class="table table-bordered table-striped tblack" style="color: #000 !important;">
                        <thead class="bg-white">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    {{-- <td class="text-center">{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td> --}}
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td class="text-center">


                                        <div class="row justify-content-center">
                                            <div class="col-6">
                                                <a class="btn btn-primary btn-sm mx-1 col-md-6"
                                                    href="#EditPart{{ $user->id }}" data-toggle="modal"
                                                    data-target="#EditPart{{ $user->id }}">Edit</a>
                                            </div>
                                            <div class="col-6">
                                                <a class="btn btn-danger btn-sm mx-1 col-md-6"
                                                    href="{{ route('user.hapus', $user->id) }}"
                                                    onclick="return confirm('Data akan dihapus?')">Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="mb-3">
                        {{ $users->links() }}
                    </div> --}}
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
                                        action="{{ route('user.simpan') }}">
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
                    @foreach ($users as $item)
                        <div class="modal fade" id="EditPart{{ $item->id }}" role="dialog" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Edit Role</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" enctype="multipart/form-data" method="post"
                                            action="{{ route('user.update', $item->id) }}">
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
                                                        <label class="form-label">Role</label>
                                                        <select name="role" class="form-control" id="">
                                                            <option value="1">Admin</option>
                                                            <option value="2">User</option>
                                                        </select>
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
