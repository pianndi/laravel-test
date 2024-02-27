
@extends("layouts.main")

@section("container")
<div class="row d-flex justify-content-center">
    <div class="card col-md-6 my-5 ">
  <form action="/register" method="post">
    @csrf
      <div class="card-body">
        <h1 class="card-title text-center my-2">Daftar</h1>
        <div class="form-group mb-3">
          
  <label for="name">Nama</label>
<div class="input-group">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
  <input type="text" class="form-control @error('name') is-invalid @enderror" required placeholder="Masukkan Nama" name="name" id="name" value="{{ old('name') }}">
  @error('name')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
</div>
</div>
        <div class="form-group mb-3">
          
  <label for="username">Username</label>
<div class="input-group">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
  <input type="text" class="form-control @error('username') is-invalid @enderror" required placeholder="Masukkan Username" name="username" id="username" value="{{ old('username') }}">
  @error('username')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
</div>
</div>
        <div class="form-group mb-3">
          
  <label for="email">Email</label>
<div class="input-group">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
  <input type="email" class="form-control @error('email') is-invalid @enderror" required placeholder="Masukkan Email" name="email" id="email" value="{{ old('email') }}">
  @error('email')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
</div>
</div>
<div class="form-group mb-4">
<label for="pass">Password</label>
<div class="input-group mb-2">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
    <input type="password" class="form-control @error('password') is-invalid @enderror" required name="password" id="pass" placeholder="Masukkan Password">
<button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-eye"></i></button>
    @error('password')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
</div>
<div class="input-group">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-lock2-fill"></i></span>
    <input type="password" name="verify_password" class="form-control @error('verify_password') is-invalid @enderror" required id="pass2" placeholder="Konfirmasi Password">
<button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-eye"></i></button>
@error('verify_password')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
@enderror
</div>
</div>
<div class="input-group mb-3">
        <button type="submit" class="btn btn-danger w-100">Daftar</button>
</div>
    <small class="form-text text-muted">Sudah memiliki akun? <a href="/login">Masuk Sekarang</a>!</small>
        </div>
  </form>
    </div>
</div>
@endsection