@extends("layouts.main")

@section("container")
<div class="row"></div>
  <div class="col-lg-10">
    <h2 class="card-title">{{ $data->title }}</h2>
        <p class="card-text"><small class="text-body-secondary">By. <a href="/post?author={{ $data->author->username }}">{{ $data->author->name }}</a> pada kategori <a href="/post?category={{ $data->category->slug }}">{{ $data->category->name }}</a> • {{ $data->created_at->diffForHumans() }}</small></p>
                @if($data->image)
  <img src="{{ asset('storage/'.$data->image) }}" class="w-100 object-fit ratio ratio-16x9 mb-2" alt="...">
        @else
  <img src="https://source.unsplash.com/random/1080×720/?{{ $data->category->slug }}" class="w-100 object-fit ratio ratio-16x9 mb-2" alt="...">
  @endif
  <div class="card-body">
    {!! $data->body !!}
        <a onclick="history.back()" class="btn btn-primary">Kembali</a>
  </div>
</div>
</div>
@endsection