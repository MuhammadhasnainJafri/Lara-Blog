@extends('layouts.app')


@section('content')
@include('Content.back-link')
<div class="form-center">

   
    <h3>
        Create Post
    </h3>
    <form action="{{ route('user.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">Title</label>
        <input type="text" name="title" value="{{ old('title') }}" required class="form-control">
        @error('title')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="">Body</label>
        <textarea name="body" required class="form-control" cols="30" rows="10" id="editor" >{{ old('body') }}</textarea>
        @error('body')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="">Categories</label>
        <select name="category" class="form-control">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="">File Thumbnail</label>
        <input type="file" name="thumbnail" value="{{ old('thumbnail') }}" required class="form-control">
        @error('title')
        <span  role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        
        <div>
        <input type="checkbox" class="custom-control-input" name="publish" id="publish-post" checked>
        <label class="inline_label" class="custom-control-label" for="publish-post">Do you want to publish this post?</label>
        </div>
        <button class="btn btn-primary" type="submit">Create</button>
    </form>
    <!-- Include the default theme -->


    
</div>
 @endsection


