@extends('components.master')


@section('content')
    <h1 class="text-center mx-5">
        Welcome to homepage
    </h1>

    {{-- All post --}}
    <div class="container">
        <div class="row">
                @foreach ($articles as $article)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->content }}</p>
                        <p class="card-text">$ {{ $article->price }}</p>
                        <a href="#" class="btn btn-primary">Buy</a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
@endsection
