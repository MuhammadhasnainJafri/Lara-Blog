@extends('layouts.app')

@section('content')


        @include('Content.back-link')

 
             
        
  <div class='form-center'>
    <div >
          
        <h3 class="align-center">Create Category</h3>
</div>

 
    <form action="{{ route('user.categories.store') }}" method="POST">

        @csrf


            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required >

                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Create</button>

        </form>
    
</div>      
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
      





             

                    @endsection
