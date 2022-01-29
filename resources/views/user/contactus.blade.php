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
                <th>name</th>
                <th>email</th>
                <th>subject</th>
                <th>message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contactus as $contactus)
            <tr>
               
                <td>{{ $contactus->name }}</td>
                <td>{{ $contactus->email }}</td>
                <td>{{substr($contactus->subject, 0, 60)}}</td>
                <td>{{ substr($contactus->message, 0, 60) }}</td>
                <td>
                    <a class="btn btn--stroke btn--xs" href="{{ route('contactus.show', $contactus) }}" class="btn btn-xs btn-success">Show</a>

                     <form action="{{ route('user.contactus.destroy', $contactus) }}" method="POST"> 
                        @csrf @method('DELETE')

                        <button class="table-btn delete " class="btn btn-xs btn-danger" type="submit">Delete</button>
                     </form> 
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No message available.</td>
            </tr>
            @endforelse

        </tbody>
    </table>
    <div class="row">
        <div class="column large-12">
            <nav class="pgn">
                {{-- {{$contactus->links('pagination') }} --}}
            </nav> 
        </div> 
    </div>


</div>

@endsection