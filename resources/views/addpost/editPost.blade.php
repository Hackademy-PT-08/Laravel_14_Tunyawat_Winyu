@extends('components.master')


@section('content')

    <style>
        .container{
            width: 50%;
        }
    </style>
<div class="container">
    <div class="col-12">
        <form action="/profile/edit/{{ $articles->id }}" method="post" enctype="multipart/form-data">
            
            @method('PUT')
            @csrf

            <div class="form-group">
                <h2 class="text-center my-4">Edit Post</h2>
                <div class="mb-2">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $articles->title }}">
                </div>
                <div class="mb-2">
                    <label for="content" class="form-label">Content</label>
                   <textarea name="content" id="content" rows="3" class="form-control">{{ $articles->content }}</textarea>
                </div>
                <div class="mb-2">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $articles->price }}">
                </div>
                <div class="mb-2">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image[]" id="image" class="form-control" multiple>
                </div>
                <div class="mb-2">
                    <label for="categories" class="form-label">Category</label>
                    <select name="categories[]" id="categories">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ ($articles->categories->contains($category->id)) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="tags" class="form-label">Tags</label>
                    <select name="tags[]" id="tags" class="form-select">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ ($articles->tags->contains($tag->id)) ? 'selected' : '' }}>{{ $tag->name_tag }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="btn">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
                    
        </form>
    </div>
</div>
@endsection