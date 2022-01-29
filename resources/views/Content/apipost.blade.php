 
<article class="brick entry format-standard "> 
   
    <div class="entry__thumb">
        <a href="{{$response['url']}}" target="_blank" class="thumb-link">
            <img src="{{$response['urlToImage']}}" >
        </a>
    </div> <!-- end entry__thumb -->

    <div class="entry__text">
        <div class="entry__header">

            <div class="entry__meta">
                <span class="entry__cat-links">
                    {{-- <a href="{{ $post->category->path() }}">{{ $post->category->name }}</a>  --}}
                    {{-- <a href="#">{{ $post->category->name }}</a> --}}
                </span>
            </div>

            <h5 class="entry__title"><a href="">
               
              {{$response['title']}}
            </a></h5>
            
        </div>
        <div class="entry__excerpt">
           <p>
               {{$response['description']}}
               
              
           </p>

            {{-- <a href="" class="btn btn-primary mt-1">
                Read More &rarr;
            </a> --}}
            <br>
            <p>
            Posted on  {{$response['publishedAt']}} by <a href="#">{{$response['author']}}</a>
            {{-- content     name --}}
            <p>
        </div>
        
    </div> <!-- end entry__text -->
   
      
</article> <!-- end entry -->
