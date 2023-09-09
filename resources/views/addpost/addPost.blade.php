@extends('components.master')


@section('content')

    <style>
        .container{
            width: 50%;
        }
    </style>
<div class="container">
    <div class="col-12">
        <form action="{{ route('addNew.store') }}" method="post" enctype="multipart/form-data">
            
            @csrf

            <div class="form-group">
                <h2 class="text-center my-4">Add Post</h2>
                <div class="mb-2">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="content" class="form-label">Content</label>
                   <textarea name="content" id="content" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image[]" id="image" class="form-control" multiple>
                </div>
                <div class="mb-2">
                    <label for="categories" class="form-label">Category</label>
                    <select name="categories[]" id="categories" class="form-select">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="tags" class="form-label">Tags</label>
                    <select name="tags[]" id="tags" class="form-select" >
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name_tag }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="btn">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
                    
        </form>
    </div>
</div>
@endsection