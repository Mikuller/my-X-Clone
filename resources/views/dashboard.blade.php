@extends('layouts.layout')
@section('content')
    <div class="row">
        @include('shared.sidebar')
        <div class="col-6">

            @include('shared.success-msg')
            @include('shared.submit-idea')
            <hr>

            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
              @empty
                    <p class="text-center my-3">No Ideas Found</p>
            @endforelse

            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
