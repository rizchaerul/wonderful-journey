@extends('layouts.main')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-9 mt-4 mb-4">
        <h5 class="text-muted">{{ $article->category->name }}</h5>
        <h1 style="text-transform: capitalize;">{{ $article->title }}</h1>
        <p>By {{ $article->user->name }} | {{ $article->created_at }}</p>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="ratio ratio-21x9">
          <img src="{{ $article->image }}" alt="" style="object-fit: cover;">
        </div>
        <div class="d-block py-2 mb-3 border-bottom">
          <p class="m-0">{{ $article->title }}</p>
        </div>

        <div class="fs-5">{!! $article->description !!}</div>
      </div>

      @include('layouts.side')
    </div>
  </div>
  
@endsection