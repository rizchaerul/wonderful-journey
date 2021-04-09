@extends('layouts.main')

@section('content')
  <div class="container">
    <div class="row align-items-center justify-content-center" style="height: calc(100vh - 76px);">
      <div class="p-4 rounded-3 col-xxl-6 col-xl-8 col-lg-10">
        <h2>Update Your Profile</h2>
        <h4 class="lead text-muted mb-5">Fill out the form to change profile details.</h4>

        @if (Session::get('message') == 'success')
          <div class="alert alert-success">
            Succes Update!
          </div>
        @endif

        <form action="" method="post" enctype="multipart/form-data">
          @csrf

          <div class="mb-4">
            <label>Full Name</label>
            <input type="text " name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ $user->name }}" required>

            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-4">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ $user->email }}" required>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-4">
            <label>Phone Number</label>
            <input type="text" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="Phone Number" value="{{ $user->phone }}" required>
            @error('phone')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        
          <button class="btn btn-lg btn-primary float-end" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
@endsection