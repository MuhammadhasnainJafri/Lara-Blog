@extends('layouts.app')
<style>
    .create-btn {
        display: flow-root list-item;
        margin: 10px;
    }

    .create-btn a {
        float: right;


    }
    table td{
        text-align:center
    }
    form{
        display: contents;
    }

</style>
@section('content')
<div class="create-btn">
 <a href="{{ route('user.categories.create') }}" class="btn btn-primary">Create New Category</a>
                    
</div>
                    <div class="table-responsive">

                    
                    <table >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2" >
                                    Warning! Deleting categories will also delete all related posts.
                                </td>
                            </tr>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a  href="{{ route('user.categories.edit', $category) }}" class="btn btn-xs btn-info">Edit</a>

                                        <form action="{{ route('user.categories.destroy', $category) }}" method="POST">
                                            @csrf @method('DELETE')

                                            <button class="" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No categories available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
               
            


@endsection
