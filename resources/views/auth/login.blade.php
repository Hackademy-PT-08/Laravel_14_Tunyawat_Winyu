@extends('components.master')

@section('content')
    <style>
        .container{
            width: 50%;
        }

        .btn{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    <div class="container mt-5">
        <div class="col-12">
            <form action="/login" method="post">
            
                @csrf
                <div class="form-group">
                    <h2 class="text-center">Login</h2>
                    {{-- field for name --}}
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Write your name here">
                    </div>
                    {{-- field for email --}}
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Write your Email here">
                    </div>
                    {{-- field for password --}}
                    <div class="mb-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    {{-- Login BTN --}}
                    <div class="btn">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection