@extends('backend.layouts.app')

@section('pageName')
    Purchased Plans
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Purchased Plans</h4>
                    <h5 class="card-subtitle">Total purchased <b>{{ $allPurchasedPlans->count() }}</b> Time</h5>

                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Subscriber Number</th>
                                    <th>Package</th>
                                    <th>Autorenewal</th>
                                    <th>Autorenewed</th>
                                    <th>End at</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($allPurchasedPlans as $allPurchasedPlan)
                                    <tr>

                                        <td>{{ ($allPurchasedPlans->currentpage() - 1) * $allPurchasedPlans->perpage() + $loop->index + 1 }}
                                        </td>
                                        <td>{{ $allPurchasedPlan->subscriber->phone_num }}</td>
                                        <td>{{ $allPurchasedPlan->planName->plan_name }}</td>
                                        <td>{{ $allPurchasedPlan->autorenew == 1 ? 'yes' : 'no' }}</td>
                                        <td>{{ $allPurchasedPlan->renewed }} time</td>
                                        <td>{{ $allPurchasedPlan->end_at }}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>

                                    <td colspan="5">
                                        <div class="text-right d-flex justify-content-end">
                                            {{ $allPurchasedPlans->links() }}
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
