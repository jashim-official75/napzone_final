@extends('backend.layouts.app')

@section('pageName')
    Subscribers
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                @livewire('backend.subscribers')
            </div>
        </div>
    </div>

@endsection
