@extends('backend.layouts.app')

@section('pageName')
    Games
@endsection

@section('styles')
    <!-- Footable CSS -->
    <link href="{{ asset('/assets/backend/plugins/footable/css/footable.core.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Contact Emplyee list</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Game</th>
                                    <th>Exclusive</th>
                                    <th>Free</th>
                                    <th>Categories</th>
                                    <th>Game File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($games as $game)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail) }}"
                                                alt="user" width="40" class="img-circle" /> {{ $game->game_name }}
                                        </td>
                                        <td>{{ $game->is_exclusive == 1 ? 'yes' : 'no' }}</td>
                                        <td>{{ $game->is_free == 1 ? 'yes' : 'no' }}</td>
                                        <td>
                                            @php
                                                $categories = [];
                                            @endphp
                                            @foreach ($game->gameCategories as $category)
                                                @php
                                                    array_push($categories, $category->categoryName->category_name);
                                                @endphp
                                            @endforeach
                                            {{ implode(', ', $categories) }}
                                        </td>

                                        <td>{{ $game->game_file }}</td>

                                        <td>

                                            <a href="{{ route('dashboard.game.edit', $game) }}" data-toggle="tooltip"
                                                data-original-title="Edit" style="background: transparent; border: none;">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                            <form action="{{ route('dashboard.game.destroy', $game) }}" method="post"
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
                                    <td colspan="2">
                                        <a href="{{ route('dashboard.game.add') }}" class="btn btn-info btn-rounded">Add
                                            New
                                            Game</button>
                                    </td>

                                    <td colspan="7">
                                        <div class="text-right d-flex justify-content-end">
                                            {{ $games->links() }}
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

@section('scripts')

    <!-- Footable -->
    {{-- <script src="{{ asset('/assets/backend/plugins/footable/js/footable.all.min.js') }}"></script> --}}
    <!--FooTable init-->
    {{-- <script src="{{ asset('/assets/backend/js/footable-init.js') }}"></script> --}}
@endsection
