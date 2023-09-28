@extends('layouts.layout')
@section('content')
    <div class="row">
        @include('sidebar')
        <div class="col-6">

            @include('shared.success-msg')
            @include('shared.submit-idea')
            <hr>

            @foreach ($ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
            @endforeach
            <div class="mt-3">
                {{ $ideas->links() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header pb-0 border-0">
                    <h5 class="">Search</h5>
                </div>
                <div class="card-body">
                    <input placeholder="...
                    " class="form-control w-100" type="text" id="search">
                    <button class="btn btn-dark mt-2"> Search</button>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header pb-0 border-0">
                    <h5 class="">Who to follow</h5>
                </div>
                <div class="card-body">
                    <div class="hstack gap-2 mb-3">
                        <div class="avatar">
                            <a href="#!"><img class="avatar-img rounded-circle"
                                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt=""></a>
                        </div>
                        <div class="overflow-hidden">
                            <a class="h6 mb-0" href="#!">Mario Brother</a>
                            <p class="mb-0 small text-truncate">@Mario</p>
                        </div>
                        <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                                class="fa-solid fa-plus"> </i></a>
                    </div>
                    <div class="hstack gap-2 mb-3">
                        <div class="avatar">
                            <a href="#!"><img class="avatar-img rounded-circle"
                                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt=""></a>
                        </div>
                        <div class="overflow-hidden">
                            <a class="h6 mb-0" href="#!">Mario Brother</a>
                            <p class="mb-0 small text-truncate">@Mario</p>
                        </div>
                        <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                                class="fa-solid fa-plus"> </i></a>
                    </div>
                    <div class="d-grid mt-3">
                        <a class="btn btn-sm btn-primary-soft" href="#!">Show More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
