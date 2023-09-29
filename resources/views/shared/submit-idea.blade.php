<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{ route('idea.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" name="idea" id="idea" rows="3"></textarea>
            @error('idea')
                <span class="fs-6 text-danger"> {{ $message }} </span>
            @enderror
        </div>
        
        <div class="">
            <button class="btn btn-dark" type="submit"> Share </button>
        </div>
    </form>


</div>
