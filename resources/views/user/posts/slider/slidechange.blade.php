@extends('layouts.app')



@section('content')
 @include('Content.back-link')

<div class='form-center'>

       
               <h3>Edit Slider</h3>     
               

               
                <form action="{{ route('user.slide.update', $slide) }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ $slide->title }}" required class="form-control">

                            @error('title')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        
                           
                      
                            <img width='100' src="{{asset('PostThumbnail/'.$slide->img_thumbnail)}}" alt="img thubnail here">

                            <label for="">Change thumbnail</label>
                            <input type="file" name="thumbnail" value="{{ old('thumbnail') }}" required class="form-control">
                            @error('thumbnail')
                            <span  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                       
                        <button class="btn btn-primary" type="submit">Update</button>

                    </form>
                </div>
          


@endsection
