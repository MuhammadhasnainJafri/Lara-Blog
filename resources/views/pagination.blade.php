<ul>

    @if ($paginator->hasPages())
    @if ($paginator->onFirstPage())
    <li>
        <a class="pgn__prev" >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.707 17.293L8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path></svg>
        </a>
    </li>
    @else
    <li>
        <a class="pgn__prev" href="{{$paginator->previousPageUrl()}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.707 17.293L8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path></svg>
        </a>
    </li>

    @endif

  {{-- {{  print_r($elements)
}} --}}
  @if(is_array($elements[0]))
  @foreach ($elements[0] as $page=>$url)
      {{-- {{print_r($url)}} --}}
      @if ($paginator->currentPage()==$page)
      <li><a class="pgn__num current" href="{{$url}}">{{$page}}</a></li>
     @else 
     <li><a class="pgn__num " href="{{$url}}">{{$page}}</a></li>
      @endif
     
  @endforeach
  @endif
    
  @if ($paginator->hasMorePages())
    <li>
        <li>
            <a class="pgn__next" href="{{$paginator->nextPageUrl()}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11.293 17.293l1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
            </a>
        </li>
    </li>
    @else
    <li>
        <li>
            <a class="pgn__next" >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11.293 17.293l1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
            </a>
        </li>
    </li>

    @endif
   
   
        
    @endif
    
</ul>