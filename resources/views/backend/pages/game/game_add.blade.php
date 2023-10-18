@extends('backend.layouts.app')

@section('pageName')
    Add Game
@endsection

@section('styles')
    {{-- File Upload --}}
    <link rel="stylesheet" href="{{ asset('/assets/backend/plugins/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <h3 class="box-title m-b-30">Add Game</h3>
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
                        <form action="{{ route('dashboard.game.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Game Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Gamename" name="game_name" value="{{ old('game_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-3">Game Categories</label>
                                        <div class="demo-checkbox">
                                            @foreach ($categories as $category)
                                                <input type="checkbox" id="md_checkbox_{{ $loop->index + 1 }}"
                                                    class="filled-in chk-col-red" name="category_name[]"
                                                    value="{{ $category->id }}" />
                                                <label
                                                    for="md_checkbox_{{ $loop->index + 1 }}">{{ $category->category_name }}</label>
                                            @endforeach


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-3">Is this game free?</label>
                                        <div class="m-b-10">
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" type="radio" class="custom-control-input" name="is_free"
                                                    value="1">
                                                <span class="custom-control-label">Yes</span>
                                            </label>
                                        </div>
                                        <div class="m-b-10">
                                            <label class="custom-control custom-radio">
                                                <input id="radio2" type="radio" class="custom-control-input" name="is_free"
                                                    value="0">
                                                <span class="custom-control-label">No</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-3">Exclusive Game?</label>
                                        <div class="m-b-10">
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" type="radio" class="custom-control-input"
                                                    name="is_exclusive" value="1">
                                                <span class="custom-control-label">Yes</span>
                                            </label>
                                        </div>
                                        <div class="m-b-10">
                                            <label class="custom-control custom-radio">
                                                <input id="radio2" type="radio" class="custom-control-input"
                                                    name="is_exclusive" value="0">
                                                <span class="custom-control-label">No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-sm-1"></div>
                                <div class="col-sm-5 col-xs-5">
                                    <div class="card-body">
                                        <label for="exampleInputEmail1" class="mb-4">Game Thumbnail</label>

                                        <input type="file" id="input-file-max-fs" class="dropify"
                                            data-max-file-size="2M" name="game_thumbnail" />
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


    {{-- File Upload --}}
    <script src="{{ asset('/assets/backend/plugins/dropify/dist/js/dropify.min.js') }}"></script>
    {{-- Multiple Select --}}

    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })

        });
    </script>
@endsection
