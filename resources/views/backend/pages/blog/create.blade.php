@extends('backend.layouts.app')
@section('pageName')
    Add Blog
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <h3 class="box-title m-b-30">Add Blog</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" placeholder="Blog Title"
                                            name="title" value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_title">Sub Title</label>
                                        <input type="text" class="form-control" id="sub_title"
                                            placeholder="Blog Sub Title" name="sub_title" value="{{ old('sub_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="MainDescription">Description</label>
                                        <textarea class="form-control" id="MainDescription" placeholder="Enter Game Description" name="description">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <textarea class="form-control" id="meta_title" placeholder="Meta Title" name="meta_title">{{ old('meta_title') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <textarea class="form-control" id="meta_keyword" placeholder="Meta Keyword" name="meta_keyword">{{ old('meta_keyword') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" placeholder="Meta Description" name="meta_description">{{ old('meta_description') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="thumbnail">Thumbnail Image</label>
                                        <input type="file" class="form-control" id="thumbnail" name="thumbnail"
                                            onchange="previewImageThumbnail(event)">
                                        <img src="{{ asset('others/blog.png') }}" alt="" class="mt-3"
                                            id="image-preview-thumbnail" height="200" width="300">
                                    </div>

                                    <div class="form-group">
                                        <label for="banner">Banner Image</label>
                                        <input type="file" class="form-control" id="banner" name="banner"
                                            onchange="previewImageBanner(event)">
                                        <img src="{{ asset('others/blog.png') }}" alt="" class="mt-3"
                                            id="image-preview-banner" height="200" width="300">
                                    </div>

                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-success waves-effect waves-light m-r-10 m-t-20">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        //---thumbnail image preview
        function previewImageThumbnail(event) {
            const imagePreview = document.getElementById('image-preview-thumbnail');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
            }
        }
        //----banner image preview----
        function previewImageBanner(event) {
            const imagePreview = document.getElementById('image-preview-banner');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
            }
        }

        //---description editor add---
        tinymce.init({
            selector: '#MainDescription'
        });
    </script>
@endsection
