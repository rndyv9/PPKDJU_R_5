@extends('layouts.admin_template')

@section('title', $title)

@section('content')
    <div class="col-12">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between mb-1">
                    <h1><i class="fas fa-book"></i> Mata pelajaran Management</h1>
                    <a class="btn btn-primary btn-sm" href="#AddPart" data-toggle="modal" data-target="#AddPart">Tambah Data</a>
                </div>
                <div class="col-lg-12">
                    <table id="student" class="table table-bordered table-striped tblack" style="color: #000 !important;">
                        <thead class="bg-white">
                            <tr>
                                {{-- <th>No</th> --}}
                                <th>Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mata_pelajarans as $index => $mata_pelajaran)
                                <tr>
                                    {{-- <td class="text-center">{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td> --}}
                                    <td>{{ $mata_pelajaran->nama_pelajaran }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm mx-1" href="#EditPart{{ $mata_pelajaran->id }}"
                                            data-toggle="modal" data-target="#EditPart{{ $mata_pelajaran->id }}">Edit</a>
                                        <x-delete_button :route="route('mata-pelajaran.destroy', $mata_pelajaran->id)" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Add Part --}}
                    <x-form_modal id="AddPart" title="Add Data" :action="route('mata-pelajaran.store')">
                        <x-input name="nama_pelajaran" label="Nama pelajaran" placeholder="John Doe" />
                    </x-form_modal>

                    {{-- Edit Sparepart --}}
                    @foreach ($mata_pelajarans as $item)
                        <x-form_modal id="EditPart{{ $item->id }}" title="Edit Data" :action="route('mata-pelajaran.update', $item->id)" method="PUT">
                            <x-input name="nama_pelajaran" label="Nama pelajaran" :value="$item->nama_pelajaran" />
                        </x-form_modal>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
