@extends('layouts.main')

@section('content')
  <div class="container">
    <div class="row align-items-center justify-content-center" style="height: calc(100vh - 76px);">
      <div class="p-4 rounded-3 col-xxl-6 col-xl-8 col-lg-10">
        <h2>Welcome to Wonderful Journey</h2>
        <h4 class="lead text-muted mb-5">Fill out the form to get started.</h4>

        <form action="/register" method="post" enctype="multipart/form-data">
          @csrf

          <div class="mb-4">
            <label>Full Name</label>
            <input type="text " name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ old('name') }}" required>
            
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-4">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}" required>
            
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-4">
            <label>Phone Number</label>
            <input type="text" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="Phone Number" value="{{ old('phone') }}" required>
            
            @error('phone')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="row">
            <div class="col-12 col-md-6">
              <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" required>

                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="col">
              <div class="mb-4">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required>

                @error('passwod_confirmation')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
        
          <div class="row justify-content-between align-items-center">
            <div class="col-8">
              <p class="text-muted">Already have an account? <a class="text-decoration-none" href="/login">Login</a></p>
            </div>
            
            <div class="col-4">
              <button class="btn btn-lg btn-primary float-end" type="submit">Register</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection