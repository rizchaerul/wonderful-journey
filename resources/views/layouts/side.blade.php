<div class="col-3 d-none d-lg-block">
  <div class="mb-4">
    <h5>Categories</h5>
    @foreach (App\Category::all() as $category)
    <a class="d-block text-muted text-decoration-none" href="/article/category/{{ $category->id }}">{{ $category->name }}</a>
    @endforeach
  </div>

  <div>
    <h5>Random Article</h5>
  </div>

  <style>
    .title {
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
      }
  </style>

  @foreach (App\Article::inRandomOrder()->limit(5)->get() as $article)
    <div class="row g-0 mb-3" style="cursor: pointer;" onclick="location.href = '/article/{{ $article->id }}'">
      <div class="col-3">
        <div class="ratio ratio-1x1 rounded-3 overflow-hidden">
          <img src="{{ $article->image }}" alt="" style="object-fit: cover;">
        </div>
        {{-- <div class="ratio ratio-1x1 bg-dark rounded"></div> --}}
      </div>
      {{-- <div class="col-sm-4" style="min-height: 50px; background-image: url('https://wartawisata.id/wp-content/uploads/2018/06/danau-toba-4168x2779-4k-hd-wallpaper-indonesia-sailing-ship-rocks-sea-1044.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;"> --}}
      {{-- </div> --}}
      <div class="col px-1">
        <h6 class="title overflow-hidden m-0" style="text-transform: capitalize">{{ $article->title }}</h6>
        <h6 class="text-muted text-truncate fw-normal"><small>{{ $article->user->name }}</small></h6>
      </div>
    </div>
  @endforeach
  
</div>