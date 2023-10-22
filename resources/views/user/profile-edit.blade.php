<form enctype="multipart/form-data" action="{{route('user.update', auth()->id())}}" method="POST"> 
    @csrf
    @method('PUT')
<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="{{ $user->name }}">

                <div>

                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    @error('name')
                        <span class="text-danger fs-6">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            @auth
                @if (auth()->id() == $user->id)
                    <div>
                        <a href="{{ route('user.show', $user->id) }}">View</a>
                    </div>
                @endif
            @endauth

        </div>
        <div class="mt-4">
            <lable for="image">Profile Picture</lable>
            <input class="form-control" type="file" name="image" id="image">
        </div>

        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>

            <textarea class="form-control" name="bio" id="bio" rows="3"></textarea>
            <div class="mt-2 mb-3">
                <button class="btn btn-primary btn-sm"> Save </button>
            </div>

        </div>
    </div>
</div>
<hr>
</form>
