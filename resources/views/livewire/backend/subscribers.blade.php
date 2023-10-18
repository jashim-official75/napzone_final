<div class="card-body">
    <h4 class="card-title">All Subscribers list</h4>
    <h5 class="card-subtitle">Total <b>{{ $subscribers->total() }}</b> subscribers</h5>
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
                    <th>Uniqe ID</th>
                    <th>Phone Number</th>
                    <th>Logged In</th>
                    <th>Verfied</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subscribers as $subscriber)
                    <tr>
                        <td>{{ ($subscribers->currentpage() - 1) * $subscribers->perpage() + $loop->index + 1 }}
                        </td>
                        <td>
                            {{ $subscriber->unique_id }}
                        </td>
                        <td>{{ $subscriber->phone_num }}</td>
                        <td>{{ $subscriber->details->count() }}</td>
                        <td>{{ $subscriber->otp_verified == 1 ? 'yes' : 'no' }}</td>

                        <td>

                            <a href="#" style="background: transparent; border: none;" data-toggle="modal"
                                data-target="#subscriber-details{{ $loop->index + 1 }}">
                                <i class=" fa fa-eye text-inverse m-r-10" data-toggle="tooltip"
                                    data-original-title="Details"></i> </a>
                            {{-- Modal Dialog Start --}}
                            <div id="subscriber-details{{ $loop->index + 1 }}" class="modal fade in" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list"
                                                data-page-size="10">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Device</th>
                                                        <th>IP</th>
                                                        <th>Platform</th>
                                                        <th>Browser</th>
                                                        <th>Log In Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($subscriber->details as $subscriberDetails)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}
                                                            </td>
                                                            <td>
                                                                {{ $subscriberDetails->device }}
                                                            </td>
                                                            <td>{{ $subscriberDetails->ip }}</td>
                                                            <td>{{ $subscriberDetails->platform }}</td>
                                                            <td>{{ $subscriberDetails->browser }}</td>
                                                            <td>{{ $subscriberDetails->created_at->diffForhumans() }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect"
                                                data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


                            {{-- Modal Dialog End --}}
                            <a href="{{ route('dashboard.subscriber.gamePlayed', $subscriber->phone_num) }}"
                                style="background: transparent; border: none;">
                                <i class=" fa fa-gamepad  text-inverse m-r-10" data-toggle="tooltip"
                                    data-original-title="Game Played"></i> </a>
                            <button type="submit" data-toggle="tooltip" data-original-title="Delete"
                                style="background: transparent; border: none;"
                                onclick="return confirm('Are you sure you want to delete this item?');"
                                wire:click="remove({{ $subscriber->id }})">
                                <i class="fa fa-close text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>

                    <td colspan="5">
                        <div class="text-right d-flex justify-content-end">
                            {{ $subscribers->links() }}
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
