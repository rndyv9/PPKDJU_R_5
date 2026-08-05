@extends('layouts.admin_template')

@section('title', 'Create New')

@section('content')
    @php
        $isEdit = isset($about) && $about->exists;
    @endphp

    <div class="row">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="font-weight-bold">{{ $title ?? '' }}</h6>
                    </div>
                    <div class="card-body">
                        <x-form :action="$isEdit ? route('about.update', $about) : route('about.store')" method="POST" enctype="multipart/form-data">
                            @if ($isEdit)
                                @method('PUT')
                            @endif

                            <x-input name="name" label="Name" placeholder="Enter name" :value="old('name', $about->name ?? '')" required />
                            <x-input name="birthday" type="date" label="Birthday" placeholder="Enter birthday"
                                :value="old(
                                    'birthday',
                                    isset($about) && $about->birthday
                                        ? \Carbon\Carbon::parse($about->birthday)->format('Y-m-d')
                                        : '',
                                )" required />
                            <x-input name="email" type="email" label="Email" placeholder="Enter email"
                                :value="old('email', $about->email ?? '')" required />
                            <x-input name="address" label="Address" placeholder="Enter address" :value="old('address', $about->address ?? '')"
                                required />
                            <x-input name="telp" type="tel" label="Telp" placeholder="Enter telp" :value="old('telp', $about->telp ?? '')"
                                required />
                            <x-input name="postal_code" label="Postal Code" placeholder="Enter postal code"
                                :value="old('postal_code', $about->postal_code ?? '')" required />

                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" id="" class="form-control" cols="30" rows="10">{{ old('description', $about->description ?? '') }}</textarea>
                            </div>

                            <x-input name="github" label="Github" placeholder="Enter github link" :value="old('github', $about->github ?? '')"
                                required />
                            <x-input name="linkedin" label="Linkedin" placeholder="Enter linkedin link" :value="old('linkedin', $about->linkedin ?? '')"
                                required />
                            <x-input name="porto" label="Portofolio" placeholder="Enter portofolio link" :value="old('porto', $about->porto ?? '')"
                                required />
                            <x-input type="file" name="photo" label="Photo" accept="image/*" />

                            <div class="mb-3">
                                <label for="" class="form-label">Status :</label>
                                <input type="radio" name="is_active" value="1"
                                    {{ old('is_active', $about->is_active ?? 1) == 1 ? 'checked' : '' }}>Publish
                                <input type="radio" name="is_active" value="0"
                                    {{ old('is_active', $about->is_active ?? 1) == 0 ? 'checked' : '' }}>Draft
                            </div>

                            <button class="btn btn-primary" type="submit">
                                {{ $isEdit ? 'Update' : 'Save' }}
                            </button>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
