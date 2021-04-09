@extends('layouts.main')

@section('content')
  <div class="py-5" style="background-image: url('/cover.jfif'); background-repeat: no-repeat; background-position: center; background-size: cover;">
      <div class="d-flex justify-content-center align-items-center">
        <h1 class="py-md-5 display-3 fw-bolder text-center text-white">Blog of Indonesia Tourism</h1>
      </div>
  </div>
  
  <div class="container">
    <div class="mb-4"></div>
    @include('layouts.articles')
  </div>
@endsection