@extends('components.master')

@section('content')

    <style>
        .container{
            width: 50%;
        }
    </style>
    <div class="container">
        <div class="col-12">

                 {{-- Form for email/name Edit --}}

            <form action="/user/profile-information" method="post">
                
                @method('PUT')
                @csrf
                <div class="form-group">
                    <h3 class="text-center my-3">Email/Name Edit</h3>
                    {{-- field for email edit --}}
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}">
                    </div>
                    {{-- field for name edit --}}
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="btn">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            
            </form>

            
                {{-- Form for Password edit --}}

            <form action="/user/password" method="post">
                
                @method('PUT')
                @csrf
                <div class="form-group">
                    <h3 class="text-center my-3">Password Edit</h2>
                    {{-- field for current password--}}
                    <div class="mb-2">
                        <label for="password" class="form-label">Current Password</label>
                        <input type="password" name="current_password" id="password" class="form-control">
                    </div>
                    {{-- field for new password--}}
                    <div class="mb-2">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" name="password" id="new_password" class="form-control">
                    </div>
                    {{-- field for confirmation of new password--}}
                    <div class="mb-2">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="new_password_confirmation" class="form-control">
                    </div>
                    <div class="btn">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection