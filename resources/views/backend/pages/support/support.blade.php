@extends('backend.layouts.app')

@section('pageName')
    Support Center
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Support center</h4>
                    <h5 class="card-subtitle">Total support requests <b>{{ $supports->total() }}</b></h5>
                    @if (Route::currentRouteName() == 'dashboard.support')
                        <div>
                            <a href="{{ route('dashboard.support.unread') }}"
                                class="btn btn-secondary waves-effect text-dark" data-dismiss="modal">Show all unread</a>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Phone Number</th>
                                    <th>Problem</th>
                                    <th>Time</th>
                                    <th>Contacted</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($supports as $support)
                                    <tr @if (!$support->contacted) class="bg-dark text-white" @endif>

                                        <td>{{ $loop->index + 1 }}
                                        </td>
                                        <td>{{ $support->phone_num }}</td>
                                        <td>{{ Str::limit($support->problem, 40) }}</td>
                                        <td>{{ $support->created_at->diffForhumans() }}</td>
                                        <td>{{ $support->contacted == 1 ? 'yes' : 'no' }}</td>
                                        <td>
                                            <a href="#" style="background: transparent; border: none;" data-toggle="modal"
                                                data-target="#problem-details{{ $loop->index + 1 }}">
                                                <i class=" fa fa-eye @if (!$support->contacted) text-white @else text-inverse @endif m-r-10" data-toggle="tooltip"
                                                    data-original-title="Details"></i> </a>
                                            {{-- Modal Dialog Start --}}
                                            <div id="problem-details{{ $loop->index + 1 }}" class="modal fade in"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table id="demo-foo-addrow"
                                                                class="table m-t-30 table-hover contact-list"
                                                                data-page-size="10">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Problem</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{ $support->problem }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form
                                                                action="{{ route('dashboard.support.mark', $support->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="btn btn-primary waves-effect text-white">Mark
                                                                    as
                                                                    Contacted</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>

                                    <td colspan="5">
                                        <div class="text-right d-flex justify-content-end">
                                            {{ $supports->links() }}
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
