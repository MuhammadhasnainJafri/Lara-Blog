@extends('layouts.app')

@section('content')

    

<section class="s-content s-content--single">
    <div class="row">
        <div class="column large-12">

            <article class="s-post entry format-standard">

                <div class="s-content__media">
                    <div class="s-content__post-thumb">
                        <img src="images/thumbs/single/standard/standard-1050.jpg"  alt="">
                    </div>
                </div> <!-- end s-content__media -->

                <div class="s-content__primary">

                    <h2 class="s-content__title s-content__title--post">
                        {{ $post->title }}</h2>

                    <ul class="s-content__post-meta">
                        <li class="date">
                            Posted On : {{ $post->created_at->toDayDateTimeString() }}</li>
                        <li class="cat">
                            Category : <a href="{{ $post->category->path() }}">{{ $post->category->name }}</a>
                            
                        </li>
                        
                    </ul>
                   
                    {!! str_replace('<script', "&lt;script", $post->body) !!}


                    <p class="s-content__post-tags">
                        <span>Tagged in :</span>
                        <a href="#">orci</a><a href="#">lectus</a><a href="#">varius</a><a href="#">turpis</a>
                    </p>

                    <div class="s-content__author">
                        <img src="{{asset('images/avatars/user-06.jpg')}}" alt="">

                        <div class="about">
                            <h5><a href="/user/{{$post->user->id}}/post">{{ $post->user->name }}</a></h5>
                        
                            

                            <ul class="author-social">
                            
                           
                            {{-- {{json_decode($string, true);}} --}}
                                {{-- @foreach ($post->user->Social_link as $link )
                                   {{$link}}
                                @endforeach --}}
                            </ul>
                        </div>
                    </div> <!-- end s-content__author -->


                    <div class="s-content__pagenav group">
                       @if($privous)
                        <div class="prev-nav">
                            <a href="{{$privous->id }}" rel="prev">
                                <span>Previous</span>
                                {{$privous->title}}
                            </a>
                        </div>
                        @endif
                         @if($next)
                         <div class="next-nav">
                             <a href="{{$next->id }}" rel="next">
                                 <span>Next</span>
                                {{$next->title}}
                             </a>
                         </div>
                         @endif
                     </div> <!-- end s-content__pagenav -->

                </div> <!-- end s-content__primary -->
            </article>

        </div> <!-- end column -->
    </div> <!-- end row -->


    <!-- comments
    ================================================== -->
   
              

                <!-- START commentlist -->
               
                    @if($post->comments->isNotEmpty()) 
                    <div class="comments-wrap">

                        <div id="comments" class="row">
                            <div class="column">
                                <ol class="commentlist">
                    <h3>{{$post->comments->count()}} Comments</h3>
                    @foreach ($post->comments as $comment)
    
                        @include('widget.comment')
    
                    @endforeach
                     
                </ol>
                <!-- END commentlist -->

            </div> <!-- end col-full -->
        </div> <!-- end comments -->
   
    
                @endif

                    
               




               @auth
                @include('Content.comment-form') 
                @else
               <h5 class="text-center "> Please <a class="text-success" href="/login">Login here</a> to send comment  </h5>
               @endauth
               
                

                
               

            

    </div> <!-- end comments-wrap -->

</section> <!-- end s-content -->
@endsection













