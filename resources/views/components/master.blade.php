<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>

    {{-- NAVBAR --}}

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Blog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Post</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categories
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Landscape</a></li>
                  <li><a class="dropdown-item" href="#">Potraits</a></li>
                  <li><a class="dropdown-item" href="#">Anime Paintings</a></li>
                </ul>
              </li>
            </ul>
            {{-- if users are not logged it yet --}}
            @if (!auth()->check())
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-3">
                        <a class="btn btn-primary" href="/login">Login</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="btn btn-primary" href="/register">Sign in</a>
                    </li>
                </ul>
            @endif
            {{-- if users are logged it yet --}}
            @if (auth()->check())
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-3">
                        <a class="btn btn-primary" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="btn btn-primary" href="{{ route('addNew.create') }}">Add Post</a>
                    </li>
                    <form action="/logout" method="post">
                        
                        @csrf
                        
                        <button class="btn btn-primary mx-3">Logout</button>
                    
                    </form>
                </ul>
            @endif
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>



      {{-- Content --}}
      @yield('content')
      {{-- footer --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>