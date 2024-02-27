@extends("layouts.main")

@section("container")
  <h1>Halaman About</h1>
  <br>
  <div>
  <img src="img/{{ $image }}" class="profile" alt="profil">
  </div>
  <h3>{{ $name }}</h3>
  <p>{{ $quote }}</p>
@endsection