<div>
        
    @if($idea->liked() == false)
    <a href="{{route('idea.like', $idea->id)}}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
        </span> {{ $idea->likes()->count() }} </a>
   @else
   <a href="{{route('idea.unlike', $idea->id)}}" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
   </span> {{ $idea->likes()->count() }} </a>
   @endif
</div>