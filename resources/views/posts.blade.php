
@extends("layouts.main")

@section("container")
  <h1 class="mb-5 text-center">{{ $page }}</h1>
<div class="row justify-content-center">
  <div class="col-md-8">
    <form action="/post">
      
    <div class="input-group mb-3">
      @if(request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if(request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">
      @endif
  <input type="text" class="form-control" placeholder="Cari kata kunci postingan" value="{{ request('search') }}" name="search">
  <button class="btn btn-outline-secondary" type="submit">Cari</button>
</div>
    </form>
</div>
</div>
  @if($data->count())
  <div class="card mb-3">
            @if($data[0]->image)
  <img src="{{ asset('storage/'.$data[0]->image) }}" class="w-100 object-fit ratio ratio-16x9 mb-2" alt="{{ $data[0]->title }}">
        @else
  <img src="https://source.unsplash.com/random/1080×720/?{{ $data[0]->category->slug }}" class="card-img-top" alt="{{ $data[0]->title }}">
  @endif
  <div class="card-body">
    <h2 class="card-title">{{ $data[0]->title }}</h2>
        <p class="card-text"><small class="text-body-secondary">By. <a href="/post?author={{ $data[0]->author->username }}">{{ $data[0]->author->name }}</a> pada kategori <a href="/post?category={{ $data[0]->category->slug }}">{{ $data[0]->category->name }}</a> • {{ $data[0]->created_at->diffForHumans() }}</small></p>
    <p class="card-text">{!! $data[0]->excerpt !!}</p>
        <a href="/post/{{$data[0]->slug}}" class="btn btn-primary">Baca Selengkapnya</a>
  </div>
</div>
<div class="row">
  
  @foreach ( $data->skip(1) as $d )
  <div class="col-md-6 mb-3">
    
    <div class="card">
      <div class="position-absolute px-3 py-2" style="background: rgba(0,0,0,0.7)">
        <a href="/post?category={{ $d->category->slug }}" class="text-white text-decoration-none">{{ $d->category->name }}</a>
      </div>
              @if($d->image)
  <img src="{{ asset('storage/'.$d->image) }}" class="card-img-top" alt="{{ $d->title }}">
        @else
      <img src="https://source.unsplash.com/random/1080×720/?{{ $d->category->slug }}" class="card-img-top" alt="{{ $d->category->slug }}">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $d->title }}</h5>
          <p class="card-text">
            <small>
            By. <a href="/post?author={{ $d->author->username }}">{{ $d->author->name }}</a> • {{ $d->created_at->diffForHumans() }}
            </small>
          </p>
        <p class="card-text">{!! $d->excerpt !!}</p>
        <a href="/post/{{$d->slug}}" class="btn btn-primary">Baca Selengkapnya</a>
      </div>
    </div>
  </div>
  @endforeach
</div>


@else
<div class="text-center">Tidak Ditemukan</div>
@endif

{{ $data->links() }}
@endsection