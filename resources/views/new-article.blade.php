@extends('layouts.main')

@section('content')
  <div class="bg-dark">
    <div class="container">
      <h1 class="py-4 mb-3 text-white">New Article</h1>
    </div>
  </div>
  
  <div class="container">
    @if (Session::get('message') == 'success')
      <div class="alert alert-success">
        Succes!
      </div>
    @endif
    
    <form action="" method="post" enctype="multipart/form-data">
      @csrf
      <div>
        <div class="row">
          <div class="col-12 col-lg-6 mb-3">
            <label class="form-label">Title</label>
            <input class="form-control form-control-lg @error('title') is-invalid @enderror" type="text" name="title" placeholder="Title" value="{{ old('title') }}">

            @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
  
          <div class="col mb-3">
            <label class="form-label">Category</label>
            <select class="form-select form-select-lg @error('categoryId') is-invalid @enderror" name="categoryId">
              <option hidden value="">Select Category</option>
              @foreach (App\Category::all() as $category)
              <option value="{{ $category->id }}" @if(old('categoryId') == $category->id) selected @endif>{{ $category->name }}</option>
              @endforeach
            </select>

            @error('categoryId')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
      </div>
  
      <div class="mb-3">
        <label class="form-label">Image</label>
        <input class="form-control form-control-lg @error('image') is-invalid @enderror" type="file" name="image">

        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-4">
        <label class="form-label">Description</label>
        <textarea class="@error('description') is-invalid @enderror" name="description"></textarea>

        @error('description')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button class="btn btn-primary mb-3" type="submit">Create</button>
    </form>
  </div>

  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('description');
    // CKEDITOR.instances['description'].setData('{!! '<p>'.str_replace("\n", "", str_replace("</p>", "", str_replace("<p>", "", old('description')))).'</p>' !!}');
</script>
@endsection