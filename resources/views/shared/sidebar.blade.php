<div class="col-3">
    <div class="card overflow-hidden">
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class=" {{ (Route::is('dashboard'))  ? 'text-white bg-primary rounded' : '' }} nav-link text-dark" href="{{ route('dashboard') }}">
                        <span>Home</span></a>
                </li>
                
                <li class="nav-item">
                    <a class=" {{ (Route::is('terms')) ? 'text-white bg-primary rounded' : ''}} nav-link" href=" {{route('terms')}}">
                        <span>Terms</span></a>
                </li>
                
            </ul>
        </div>
        @auth
        <div class="card-footer text-center py-2">
            <a class="{{ (Route::is('user.show') || Route::is('user.edit') ? 'active': 'btn btn-link btn-sm')}} " href="{{route('user.show', auth()->id())}}">View Profile </a>
        </div>
        @endauth
    </div>
</div>