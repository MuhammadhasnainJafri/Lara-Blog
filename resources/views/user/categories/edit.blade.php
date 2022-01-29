@extends('layouts.app')

@section('content')

      
       
       
       @include('Content.back-link')
       
      <h5  class="align-center">  
                      Edit Category
      </h5>

                <div class="form-center">
                <form action="{{ route('user.categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PATCH')

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" required class="form-control">

                            @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Update</button>

                    </form>
                </div>
        


@endsection
