
@extends("layouts.main")

@section("container")
<div class="row d-flex justify-content-center">
         @if(session()->has("registerSuccess"))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session("registerSuccess") }}!</strong> Selamat telah berhasil mendaftarkan akun
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      @endif
      @if(session()->has("loginError"))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{ session("loginError") }}!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      @endif
    <div class="card col-md-6 my-5 ">
  <form action="/login" method="post">
    @csrf
    {{ csrf_field() }}
      <div class="card-body">
        <h1 class="card-title text-center my-2">Masuk</h1>
        <div class="form-group mb-3">
          
  <label for="username">Username</label>
<div class="input-group">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
  <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username" name="username" value="{{ old('username') }}" id="username">
  
@error('username')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
</div>
</div>
<div class="form-group mb-4">
<label for="pass">Password</label>
<div class="input-group">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="pass" placeholder="Masukkan Password">
<button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-eye"></i></button>
    @error('password')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
</div>
</div>
<div class="input-group mb-3">
        <button type="submit" class="btn btn-danger w-100">Masuk</button>
</div>
    <small class="form-text text-muted">Belum memiliki akun? <a href="/register">Daftar Sekarang</a>!</small>
        </div>
  </form>
    </div>
</div>
@endsection