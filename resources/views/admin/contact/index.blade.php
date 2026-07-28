@extends('layouts.admin_template')

@section('title', 'Data Contact Us')

@section('content')
    <div class="row">
        <div class="">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="font-weight-bold">{{$title ?? ''}}</h6>
                    </div>
                    <div class="card-body">
                        <table id="student" class="table table-bordered table-striped tblack" style="color: #000 !important;">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $index => $contact)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td class="text-center">
                                        {{-- <a class="btn btn-primary btn-sm mx-1" href="#EditPart{{ $student->id }}"
                                            data-toggle="modal" data-target="#EditPart{{ $student->id }}">Edit</a>
                                        <a class="btn btn-danger btn-sm mx-1"
                                            href="{{ route('student.hapus', $student->id) }}"
                                            onclick="return confirm('Data akan dihapus?')">Hapus</a> --}}
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
