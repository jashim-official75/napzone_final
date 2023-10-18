@extends('backend.layouts.app')

@section('pageName')
    Category
@endsection

@section('content')


    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-4 col-sm-12">
            <div class="card card-body">
                <h3 class="box-title m-b-30">Create Your Category</h3>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="{{ route('dashboard.category.add') }}" method="POST">
                            @csrf
                            <div class="form-group @error('category_name') has-danger @enderror">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter Categoryname" name="category_name"
                                    value="{{ old('category_name') }}">
                                @error('category_name')
                                    <small class="form-control-feedback"> This field has error. </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-inverse waves-effect waves-light">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Categories</h4>
                    <div class="table-responsive" style="overflow: hidden;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Created At</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($allCategories as $category)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td class="text-nowrap">
                                            {{-- <form action="" method="post" style="display: inline">
                                            <button data-toggle="tooltip" data-original-title="Edit" style="background: #fff; border: none;"> <i class="fa fa-pencil text-inverse m-r-10"></i> </button>
                                        </form> --}}
                                            <form action="{{ route('dashboard.category.destroy', $category) }}"
                                                method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-toggle="tooltip" data-original-title="Delete"
                                                    style="background: #fff; border: none;"
                                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-close text-danger"></i>
                                                </button>
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
        <!-- Column -->
    </div>

    <!-- ============================================================== -->
    <!-- End PAge Content -->


@endsection
