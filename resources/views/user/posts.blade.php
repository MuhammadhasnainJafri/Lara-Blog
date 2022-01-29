@extends('layouts.app')

@section('content')
<style>
    table {
        width: 95%;
        margin: auto;
    }

   

   
    
</style>
<div class="create-btn">
    <a class="btn btn--stroke btn-right" href="{{ route('user.posts.create') }}" >Create New</a>
</div>
<h3 class='align-center warning'>
<div class="table-responsive">
@if (session('message'))
    {{session('message')}}
@endif
</h3>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Published</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
            <tr>
                <td>{{substr($post->title, 0, 60)}}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->published }}</td>
                <td>
                    <a class="btn btn--stroke btn--xs" href="{{ route('posts.show', $post) }}" class="btn btn-xs btn-success">Show</a>
                    <a class="btn btn--stroke btn--xs" href="{{ route('user.posts.edit', $post) }}"
                        >Edit</a>

                    <form action="{{ route('user.posts.destroy', $post) }}" method="POST">
                        @csrf @method('DELETE')

                        <button class="table-btn delete " class="btn btn-xs btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No post available.</td>
            </tr>
            @endforelse

        </tbody>
    </table>
    <div class="row">
        <div class="column large-12">
            <nav class="pgn">
                {{$posts->links('pagination') }}
            </nav> 
        </div> 
    </div>


</div>

@endsection