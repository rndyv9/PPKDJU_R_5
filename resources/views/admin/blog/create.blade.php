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
                        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter blog title" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Subcontent</label>
                                <textarea name="sub_content" id="" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Content</label>
                                <textarea name="content" id="" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Photo</label>
                                <input type="file" name="photo">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status :</label>
                                <input type="radio" name="is_active" value="1" checked>Publish
                                <input type="radio" name="is_active" value="0">Draft
                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
