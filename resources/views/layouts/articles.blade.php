<style>
  .detail {
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
  }
</style>

<div class="row">
  <div class="col-lg-9">

    @foreach ($articles as $article)
    <div class="card mb-3 overflow-hidden" onclick="location.href = '/article/{{ $article->id }}'" style="cursor: pointer;">
      <div class="row g-0">

        <img class="col-sm-4" src="{{ $article->image }}" style="object-fit: cover; height: 250px;">

        <div class="col-sm-8">
          <div class="card-body">
            <h6 class="card-title text-muted text-truncate">{{ $article->category->name }}</h6>
            <h5 class="card-title text-truncate" style="text-transform: capitalize">{{ $article->title }}</h5>
            <div class="detail card-text overflow-hidden">{!! $article->description !!}</div>
            <div class="row mt-3">
              <div class="col-8">
                <p class="card-text text-truncate"><small class="text-muted">{{ $article->user->name }} | {{ $article->created_at }}</small></p>
              </div>

              @auth
                @if (auth()->user()->id == $article->user_id || auth()->user()->role == 'admin')
                  <div class="col">
                    <form action="/article/delete" method="post">
                      @csrf
                      <input type="hidden" name="articleId" value="{{ $article->id }}">
                      <button class="btn btn-sm btn-outline-danger float-end" type="submit">Delete</button>
                    </form>
                  </div>
                @endif
              @endauth
            </div>
          </div>
        </div>

      </div>
    </div>
    @endforeach

    <div class="overflow-auto">
      {{ $articles->links() }}
    </div>
    
  </div>

  @include('layouts.side')
</div>