@extends('layouts.layout')
@section('content')
    <div class="row">
        @include('shared.sidebar')
        <div class="col-6">

            @include('shared.success-msg')
    
            <hr>
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
             
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
