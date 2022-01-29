@extends('layouts.app')

@section('content')
<style>
    table {
        width: 95%;
        margin: auto;
    }

   

   
    
</style>

<h3 class='align-center warning'>
<div class="table-responsive">
@if (session('message'))
    {{session('message')}}
@endif
</h3>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>title</th>
                {{-- <th>uploaded by</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($slides as $slide)
            <tr>
                <td><img width="100" src="{{asset('PostThumbnail/'.$slide->img_thumbnail)}}"/></td>
                <td>{{ $slide->title }}</td>
                {{-- <td>{{ $slide->posts->user->name }}</td> --}}
                <td>
                    <a class="btn btn--stroke btn--xs" href="{{ route('user.slide.edit', $slide) }}" class="btn btn-xs btn-success">Change</a>
                   

                  
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No slide available.</td>
            </tr>
            @endforelse

        </tbody>
    </table>
 


</div>

@endsection