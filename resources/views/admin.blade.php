@extends('layouts.main')

@section('content')
  <div class="bg-dark">
    <div class="container">
      <h1 class="py-4 mb-3 text-white">Admin Page</h1>
    </div>
  </div>
  
  <div class="container">
    @if (Session::get('message') == 'success')
      <div class="alert alert-success">
        Succes Delete!
      </div>
    @endif

    <div class="row">
      @foreach ($users as $user)
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-3">
          <div class="card h-100">
            <img class="card-img-top" src="/profile.png" alt="">
  
            <div class="card-body text-center">
              <h6 class="card-title text-truncate">{{ $user->name }}</h6>
              <h6 class="card-title text-truncate text-muted fw-normal">{{ $user->email }}</h6>
              <form action="" method="post">
                @csrf
                <input type="hidden" name="userId" value="{{ $user->id }}">
                <button class="btn btn-outline-danger rounded-pill" type="submit">Delete</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection