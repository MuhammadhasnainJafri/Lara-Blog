@extends('layouts.app')

@section('content')
<section class="s-pageheader">
    <div class="row current-cat">
        <div class="column">
            <h1 class="h2">Category: {{ $category->name }}</h1>
        </div>
    </div>
</section>

<section class="s-bricks">

    <div class="masonry">
        <div class="bricks-wrapper h-group">

            <div class="grid-sizer"></div>

            

               

                @each('Content.post', $posts, 'post', 'Content.empty-post')

            </div>

             

        </div>
    </section>
    
    
@endsection