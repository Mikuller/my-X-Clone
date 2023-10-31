@extends('layouts.layout')
@section('content')
<div class="row">
    @include('shared.sidebar')
    <div class="col-6">
<h1>Terms</h1>
<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
    Proinp eros quam, vestibulum a nisl et, bibendum malesuada nunc.
    Proin viverra iaculis nibh eu lacinia. 
    Quisque ornare metus vel tortor imperdiet pharetra eu et ligula. Donec mattis gravida est at luctus. Praesent tincidunt neque sit amet dui ullamcorper commodo. Ut fermentum nisi sit amet iaculis venenatis. Suspendisse aliquet, magna ullamcorper condimentum mollis, est neque ultrices libero, sit amet posuere quam magna non ligula. Aenean enim tellus, varius vitae facilisis vitae, bibendum vel purus. Donec consequat felis urna, tristique vehicula ipsum feugiat finibus. Sed convallis, mauris eget eleifend hendrerit, massa nunc euismod nibh, ut tincidunt leo leo eget urna. Proin eget nisi mattis, cursus nulla id, iaculis purus. Mauris finibus risus in nulla eleifend, vitae fringilla dui blandit. Aenean hendrerit, libero sit amet varius egestas, erat odio vulputate diam, quis elementum ligula dui non nisi.
</p>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>
@endsection