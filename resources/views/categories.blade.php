
@extends("layouts.main")

@section("container")
  <h1 class="mb-5">Daftar Kategori</h1>
  
    <ul>
  @foreach ( $data as $d )
      <li>
    <h2><a href="/post?category={{ $d->slug }}">{{ $d->name }}</a></h2>
      </li>
  @endforeach
    </ul>
@endsection