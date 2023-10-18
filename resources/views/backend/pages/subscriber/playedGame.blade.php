@extends('backend.layouts.app')

@section('pageName')
    Game Played
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Subscribers list</h4>
                    <h5 class="card-subtitle">Total Played <b>{{ $playedGames->count() }}</b> Time</h5>

                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Game Name</th>
                                    <th>Is Free</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($playedGames as $playedGame)
                                    <tr>

                                        <td>{{ $loop->index + 1 }}
                                        </td>
                                        <td>{{ $playedGame->gameDetails->first()->game_name }}</td>
                                        <td>{{ $playedGame->gameDetails->first()->is_free == 1 ? 'yes' : 'no' }}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>

                                    <td colspan="5">
                                        <div class="text-right d-flex justify-content-end">
                                            {{-- {{ $subscribers->links() }} --}}
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
