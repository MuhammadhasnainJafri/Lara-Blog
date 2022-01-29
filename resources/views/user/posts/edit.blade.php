@extends('layouts.app')


@section('content')
 @include('Content.back-link')

<div class='form-center'>

       
               <h3>Edit Post</h3>     
               

               
                <form action="{{route('user.posts.update', $post)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ $post->title }}" required class="form-control">

                            @error('title')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        
                            <label for="">Body</label>
                            <textarea name="body" required class="form-control" cols="30" rows="10">{{ $post->body }}</textarea>

                            @error('body')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                      
                            <label for="">Categories</label>
                            <select name="category" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($post->category_id == $category->id) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach 
                            </select>

                            @error('category')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                            <img src="{{asset('PostThumbnail/'.$post->post_thumbnail)}} " width="100" alt="Thubnail here">
                            <label for=""> Change Thumbnail</label>
        <input type="file" name="thumbnail" value="{{ old('thumbnail') }}"  class="form-control">
        @error('thumbnail')
        <span  role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
                        <div>
                                <input type="checkbox"  name="publish" id="publish-post" @if($post->is_published) checked @endif>
                                <label class="inline_label" for="publish-post">Do you want to publish this post?</label>

                        </div>
                        @error('publish')
                        <span  role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button class="btn btn-primary" type="submit">Update</button>

                    </form>
                </div>
          


@endsection
