@extends('layouts.main')

@section('content')
  <div class="bg-dark">
    <div class="container">
      <h1 class="py-4 mb-3 text-white">{{ $message }}</h1>
    </div>
  </div>

  <div class="container">
    @include('layouts.articles')
  </div>
@endsection