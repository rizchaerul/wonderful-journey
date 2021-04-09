@extends('layouts.main')

@section('content')
  <div class="container">
    <div class="row align-items-center justify-content-center" style="height: calc(100vh - 76px);">
      <div class="p-4 rounded-3 col-xxl-6 col-xl-8 col-lg-10">
        <h2>Welcome back</h2>
        <h4 class="lead text-muted mb-5">Log in to manage your account.</h4>

        <form action="" method="post">
          @csrf

          <div class="mb-4">
            <label>Role</label>
            <Select class="form-select form-select-lg" name="role">
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </Select>
          </div>

          <div class="mb-4">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control form-control-lg {{ Session('status') }}" placeholder="Email Address" value="{{ Session('email') }}" required>
          </div>

          <div class="mb-5">
            <label>Password</label>
            <input type="password" name="password" class="form-control form-control-lg {{ Session('status') }}" placeholder="Password" required>
          </div>
          
          <div class="row justify-content-between align-items-center">
            <div class="col-8">
              <p class="text-muted">Don't have an account? <a class="text-decoration-none" href="/register">Register</a></p>
            </div>
            
            <div class="col-4">
              <button class="btn btn-lg btn-primary float-end" type="submit">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection