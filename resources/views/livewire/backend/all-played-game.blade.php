<div class="card-body">
    <h4 class="card-title">All Played Games</h4>
    {{-- <h5 class="card-subtitle">Total <b>{{ $playedGames->total() }}</b> subscribers</h5> --}}
    <div id="" class="dataTables_filter">
        <label>
            Search:<input type="search" class="" name='phone_number' placeholder=""
                aria-controls="example23" wire:model='searchTerm'>
        </label>
    </div>
    <div class="table-responsive">
        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Game Name</th>
                    <th>Subscriber</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($playedGames as $playedGame)
                    <tr>
                        <td>{{ ($playedGames->currentpage() - 1) * $playedGames->perpage() + $loop->index + 1 }}
                        </td>
                        <td>
                            {{ $playedGame->gameDetails->first()->game_name }}
                        </td>
                        <td>{{ $playedGame->subscriberDetails->first()->phone_num }}</td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>

                    <td colspan="5">
                        <div class="text-right d-flex justify-content-end">
                            {{ $playedGames->links() }}
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
