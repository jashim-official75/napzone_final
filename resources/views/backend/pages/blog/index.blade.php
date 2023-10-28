@extends('backend.layouts.app')
@section('pageName')
    All Blogs
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('blog.create') }}" class="btn btn-info btn-rounded">Add
                        New
                        blog</a>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ ($blogs->currentpage() - 1) * $blogs->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>
                                            <img src="{{ asset($blog->thumbnail) }}" alt="user" width="80" height="80"
                                                class="img-circle" />
                                        </td>
                                        <td>
                                            <a href="{{ route('blog.edit', $blog->id) }}" data-toggle="tooltip"
                                                data-original-title="Edit" style="background: transparent; border: none;">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                            <form action="{{ route('blog.destroy', $blog->id) }}" method="post"
                                                style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-toggle="tooltip" data-original-title="Delete"
                                                    style="background: transparent; border: none;"
                                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-close text-danger"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="text-right d-flex justify-content-end">
                                            {{ $blogs->links() }}
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
