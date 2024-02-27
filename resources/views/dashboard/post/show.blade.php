@extends("dashboard.layouts.main")

@section("container")
    <form action="/dashboard/post/{{ $data->slug }}" method="post">
        @method('delete')
        @csrf
<div class="row"></div>
  <div class="col-md-10 my-3">
  <div class="card-body">
    <h2 class="card-title">{{ $data->title }}</h2>
    <div class="my-2">
      
    <a href="/dashboard/post" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
    <a href="/dashboard/post/{{ $data->slug }}/edit" class="btn btn-warning"><i class="bi bi-pen"></i> Edit</a>
      <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash"></i> Hapus</button>
    </div>
        <p class="card-text"><small class="text-body-secondary">
        kategori <a href="/post?category={{ $data->category->slug }}">{{ $data->category->name }}</a> • {{ $data->created_at->diffForHumans() }}</small></p>
        @if($data->image)
  <img src="{{ asset('storage/'.$data->image) }}" class="w-100 object-fit ratio ratio-16x9 mb-2" alt="...">
        @else
  <img src="https://source.unsplash.com/random/1080×720/?{{ $data->category->slug }}" class="w-100 object-fit ratio ratio-16x9 mb-2" alt="...">
  @endif
    {!! $data->body !!}
  </div>
</div>
</div>
      </form>
@endsection