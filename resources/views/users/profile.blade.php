@extends('components.master')

@section('content')

    <style>
        .form-group{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
    <div class="container mt-5">
        <div class="col-12">
            <div class="form-group">
                <h2 class="text-center">Profile</h2>
                {{-- Defualt User Information --}}
                <div class="mb-3 row mt-4">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control" id="staticEmail" value="{{ auth()->user()->email }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control" id="staticName" value="{{ auth()->user()->name }}">
                    </div>
                </div>
                <div class="btn mt-4">
                    <a href="{{ route('user_info.edit') }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <h3 class="text-center">All Published</h3>
            <div class="row">
                @foreach ($user_articles as $user_article)
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $user_article->image) }}" class="card-img-top" alt="{{ $user_article->title }}">
                            <div class="card-body">
                            <h5 class="card-title">{{ $user_article->title }}</h5>
                            <p class="card-text">{{ $user_article->content }}</p>
                            <p class="card-text">$ {{ $user_article->price }}</p>
                            @if (auth()->check())
                                @if (auth()->user()->id == $user_article->user_id)

                                    <a href="/profile/edit/{{ $user_article->id }}" class="btn btn-primary">edit</a>
                                    <form action="/profile/delete/{{ $user_article->id }}" method="post">
                                        
                                        @method('DELETE')
                                        @csrf
        
                                        <button type="submit" class="btn btn-danger mt-3">Delete</button>
        
                                    </form>
                                    
                                @endif
                                
                            @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection