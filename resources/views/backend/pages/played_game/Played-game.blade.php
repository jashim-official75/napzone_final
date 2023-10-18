@extends('backend.layouts.app')

@section('pageName')
    All Played Games
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @livewire('backend.all-played-game')
            </div>
        </div>
    </div>
@endsection
