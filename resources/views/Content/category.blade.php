
<article class="brick entry format-standard ">    
    <div class="entry__thumb">
        <a href="single-standard.html" class="thumb-link">
            <img src="" >
        </a>
    </div> <!-- end entry__thumb -->

    <div class="entry__text">
        <div class="entry__header">

            <div class="entry__meta">
                <span class="entry__cat-links">
                    <a href="#">{{ $post->category->name }}</a> 
                    {{-- <a href="#">{{ $post->category->name }}</a> --}}
                </span>
            </div>

            <h1 class="entry__title"><a href="{{ $post->path() }}">
                {{ $post->title }}</a></h1>
            
        </div>
        <div class="entry__excerpt">
            <p>
                {!! substr($post->body, 0, 200) !!}
            </p>

            <a href="{{ $post->path() }}" class="btn btn-primary mt-1">
                Read More &rarr;
            </a>
            <p>
            Posted on {{ $post->created_at->toDayDateTimeString() }} by <a href="#">{{ $post->user->name }}</a>
            <span class="badge badge-pill badge-info float-right">Comments {{ $post->comments_count }}</span>
            <p>
        </div>
        
    </div> 
   
      
</article> 















 <!-- page header
    ================================================== -->
    <section class="s-pageheader">
        <div class="row current-cat">
            <div class="column">
                <h1 class="h2">Category: {{ $post->category->name }}</h1>
            </div>
        </div>
    </section>


    <!-- masonry
    ================================================== -->
    <section class="s-bricks with-top-sep">

        <div class="masonry">

            <!-- brick-wrapper -->
            <div class="bricks-wrapper h-group">
 
                <div class="grid-sizer"></div>

                <article class="brick entry format-standard animate-this">
    
                    <div class="entry__thumb">
                        <a href="single-standard.html" class="thumb-link">
                            <img src="{{$post->post_thumbnail}}" alt="">
                        </a>
                    </div> <!-- end entry__thumb -->
    
                    <div class="entry__text">
                        <div class="entry__header">
    
                            <div class="entry__meta">
                                <span class="entry__cat-links">
                                    <a href="#">Design</a> 
                                    <a href="#">Photography</a>
                                </span>
                            </div>
    
                            <h1 class="entry__title"><a href="{{$post->path() }}">{{$post->title}}</a></h1>
                            
                        </div>
                        <div class="entry__excerpt">
                            <p>
                                {!! substr($post->body, 0, 200) !!}</p>
                        </div>
                    </div> <!-- end entry__text -->
    
                </article> <!-- end entry -->
 
                
 
            </div> <!-- end brick-wrapper --> 
 
        </div> <!-- end masonry -->

        <div class="row">
            <div class="column large-12">
                <nav class="pgn">
                    <ul>
                        <li>
                            <a class="pgn__prev" href="#0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.707 17.293L8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path></svg>
                            </a>
                        </li>
                        <li><a class="pgn__num" href="#0">1</a></li>
                        <li><span class="pgn__num current">2</span></li>
                        <li><a class="pgn__num" href="#0">3</a></li>
                        <li><a class="pgn__num" href="#0">4</a></li>
                        <li><a class="pgn__num" href="#0">5</a></li>
                        <li><span class="pgn__num dots">…</span></li>
                        <li><a class="pgn__num" href="#0">8</a></li>
                        <li>
                            <a class="pgn__next" href="#0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11.293 17.293l1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                            </a>
                        </li>
                    </ul>
                </nav> <!-- end pgn -->
            </div> <!-- end column -->
        </div> <!-- end row -->

    </section> <!-- end s-bricks -->
