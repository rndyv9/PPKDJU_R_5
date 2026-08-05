@extends('layouts.admin_template')

@section('title', 'Create New Blog')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="font-weight-bold">{{ $title ?? '' }}</h6>
                    </div>
                    <div class="card-body">
                        <x-form :action="route('about.store')" method="POST" enctype="multipart/form-data">
                            <x-input name="name" label="Name" placeholder="Enter name" required />
                            <x-input name="birthday" type="date" label="Birthday" placeholder="Enter birthday" required />
                            <x-input name="email" type="email" label="Email" placeholder="Enter email" required />
                            <x-input name="address" label="Address" placeholder="Enter address" required />
                            <x-input name="telp" type="tel" label="Telp" placeholder="Enter telp" required />
                            <x-input name="postal_code" label="Postal Code" placeholder="Enter postal code" required />
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <x-input name="github" label="Github" placeholder="Enter github link" required />
                            <x-input name="linkedin" label="Linkedin" placeholder="Enter linkedin link" required />
                            <x-input name="porto" label="Portofolio" placeholder="Enter portofolio link" required />
                            <x-input type="file" name="photo" label="Photo" accept="image/*" />
                            <div class="mb-3">
                                <label for="" class="form-label">Status :</label>
                                <input type="radio" name="is_active" value="1" checked>Publish
                                <input type="radio" name="is_active" value="0">Draft
                            </div>
                            <button class="btn btn-primary" type="submit">
                                Save
                            </button>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
