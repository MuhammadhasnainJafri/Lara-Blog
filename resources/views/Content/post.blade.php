
<article class="brick entry format-standard "> 
   
    <div class="entry__thumb">
        <a href="{{ $post->path() }}" class="thumb-link">
            <img src="{{asset('PostThumbnail/'.$post->post_thumbnail)}}" >
        </a>
    </div> <!-- end entry__thumb -->

    <div class="entry__text">
        <div class="entry__header">

            <div class="entry__meta">
                <span class="entry__cat-links">
                    <a href="{{ $post->category->path() }}">{{ $post->category->name }}</a> 
                    {{-- <a href="#">{{ $post->category->name }}</a> --}}
                </span>
            </div>

            <h5 class="entry__title"><a href="{{ $post->path() }}">
               
               {{Str::limit($post->title,100,'...')}}
            </a></h5>
            
        </div>
        <div class="entry__excerpt">
           <p>
               {{Str::limit(strip_tags($post->body), 100, '...')}}
               
              
           </p>

            <a href="{{ $post->path() }}" class="btn btn-primary mt-1">
                Read More &rarr;
            </a>
            <p>
            Posted on {{ $post->created_at->toDayDateTimeString() }} by <a href="#">{{ $post->user->name }}</a>
           
            <p>
        </div>
        
    </div> <!-- end entry__text -->
   
      
</article> <!-- end entry -->
