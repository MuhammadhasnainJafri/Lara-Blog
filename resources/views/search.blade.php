@extends('layouts.app')

@section('content')
<section class="s-pageheader">
    <div class="row current-cat">
        <div class="column">
            <h1 class="h2">Searched for : {{ $query }}</h1>
        </div>
    </div>
</section>

<section class="s-bricks">

    <div class="masonry">
        <div class="bricks-wrapper h-group">

            <div class="grid-sizer"></div>

            

               

                @each('Content.post', $posts, 'post', 'Content.empty-post')
               <hr>
               {{-- <h3 class="text-center">Post by other <span class="text-success">Sources</span></h3> --}}
               <div class="container-fluid position-initial">
                 @each('Content.apipost', $response['articles'], 'response', 'Content.empty-post')

</div>
            </div>

             

        </div>
    </section>
    
    
@endsection