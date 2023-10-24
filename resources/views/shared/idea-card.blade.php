<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImageURL()}}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('user.show', $idea->user->id)}}"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                @if (auth()->id() == $idea->user->id)
                    <form method="POST" action ="{{ route('idea.destroy', $idea->id) }}">
                        @csrf
                        @method('delete')

                        <a class="mx-2" href="{{ route('idea.edit', $idea->id) }}"> Edit </a>
                        <a href="{{ route('idea.show', $idea->id) }}"> View </a>
                        <button class="ms-1 btn btn-danger  btn-sm"> X </button>

                    </form>
                @endif
            </div>
        </div>

    </div>
    <div class="card-body">

        @if ($editIdea ?? false)
            <form method="POST" action="{{ route('idea.update', $idea->id) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control mt-3" name="content" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class="fs-6 text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="">
                    <button class="btn btn-dark btn-sm" type="submit"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">{{ $idea->content }}
            </p>

            <div class="mt-3 d-flex justify-content-between">
                <div>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                        </span> {{ $idea->likes }} </a>
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at }} </span>
                </div>
            </div>
            <div>
                @include('shared.comment-card')
            </div>
        @endif
    </div>
</div>
