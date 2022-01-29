@extends('layouts.app')

@section('content')
<style>
    .stats-tabs{
        width:100%;
    }
    .stats-tabs li{
        width:33%;
        margin: var(--vspace-1) 0;
        text-align: center;
    }
    .text-align-center{
        text-align:center;
    }
</style>
   

    <h3 class="text-align-center">Dashboard( {{auth()->user()->name}}  )</h3>

    <ul class="stats-tabs">
        <li><a href="user/posts">{{ $posts }} <em>Posts</em></a></li>
        <li><a href="user/categories">{{ $categories->count() }} <em>Categories</em></a></li>
        <li><a href="user/comments">{{ $comments }} <em>Comments</em></a></li>
        
    </ul>

   

</div>


@endsection
