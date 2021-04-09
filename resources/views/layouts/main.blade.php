<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">    
    <link rel="icon" href="/logo.jpg">

    <title>Wonderful Journey</title>
  </head>
  <body>
    <nav class="navbar navbar-light navbar-expand-lg bg-white shadow-sm sticky-top">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img class="rounded-circle" src="/logo.jpg" alt="" width="50" height="50">
          Wonderful Journey
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDropdown">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarDropdown">
          <div class="navbar-nav ms-auto">
            <a class="nav-link @if(Request::path() == '/') active @endif" href="/">Home</a>

            @guest
              <a class="nav-link" href="/login">Log in</a>
            @endguest

            @auth
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                  Welcome, {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                  @if (auth()->user()->role == 'user')
                    <a class="dropdown-item" href="/article/my-article">My Article</a>
                    <a class="dropdown-item" href="/article/new-article">New Article</a>
                  @endif

                  @if (auth()->user()->role == 'admin')
                    <a class="dropdown-item" href="/admin">Admin Page</a>
                  @endif

                  <a class="dropdown-item" href="/profile/update">Update Profile</a>
                  <a class="dropdown-item" href="/logout">Log Out</a>
                </div>
              </div>
            @endauth
          </div>

          @guest
            <div class="d-flex">
              <a class="btn btn-outline-dark" href="/register">Register</a>
            </div>
          @endguest
        </div>
      </div>
    </nav>
    
    @yield('content')

    <script src="/bootstrap.bundle.min.js" crossorigin="anonymous"></script>  </body>
</html>