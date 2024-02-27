@extends('dashboard.layouts.main')
@section('container')
<form action="/dashboard/category/{{ $data->slug }}" method="post">
  @method('put')
  @csrf
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Kategori</h1>
        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
      </div>
<div class="row">
  <div class="col-lg-8">
    <div class="mb-3">
  <label for="name" class="form-label">Nama</label>
  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama Kategori" name="name" value="{{ old('name', $data->name) }}" required>
  @error('name')
    <div class="small text-danger">
        {{ $message }}
      </div>
    @enderror
</div>
    <div class="mb-3">
  <label for="slug" class="form-label">Slug</label>
  <input type="text" class="form-control" id="slug" placeholder="Slug akan dibuat secara otomatis"  value="{{ old('slug',$data->slug) }}" readonly disabled>
</div>
  </div>
</div>
</form>
@endsection
