@extends('layouts.app')

@section('content')

                        <h3 class="align-center"> Comments</h3>
                        
                        {{-- <a href="{{ route('user.categories.create') }}" class="btn btn-primary">Create New</a> --}}
                        
                   
                        <div class="table-responsive">     
                    <table >
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Comment</th>
                                <th>Post</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->body }}</td>
                                    <td><a href="/posts/{{optional($comment->post)->id}}">{{ optional($comment->post)->title }}</a></td>

                                    <td class="d-flex">
                                        <form action="{{ route('user.comments.destroy', $comment) }}" method="POST">
                                            @csrf @method('DELETE')

                                            <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No categories available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
               

                    <div class="row">
                        <div class="column large-12">
                            <nav class="pgn">
                                {{$comments->links('pagination') }}
                            </nav> 
                        </div> 
                    </div>
   


@endsection
