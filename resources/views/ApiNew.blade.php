@extends('layouts.app')

@section('content')

 {{-- Content Start at here  --}}
 <section class="s-bricks">

    <div class="masonry">
        <div class="bricks-wrapper h-group">

            <div class="grid-sizer"></div>
            

         
            
           
            {{-- articals start at here  --}}
 
 @each('Content.apipost', $response['articles'], 'response', 'Content.empty-post')


            {{-- articals ends at here --}}

            

        </div> <!-- end brick-wrapper --> 

    </div> <!-- end masonry -->

    <div class="row">
        <div class="column large-12">
            <nav class="pgn">
                {{-- {{$posts->links('pagination') }} --}}
            </nav> <!-- end pgn -->
        </div> <!-- end column -->
    </div> <!-- end row -->

</section> <!-- end s-bricks -->
{{-- Content ends at here  --}}

    
    
@endsection



























