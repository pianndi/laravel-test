@extends('dashboard.layouts.main')
@section('container')
<form action="/dashboard/post" method="post" enctype="multipart/form-data">
  @csrf
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Postingan Saya</h1>
        <button type="submit" class="btn btn-primary"><i class="bi bi-cloud-upload"></i> Upload</button>
      </div>
<div class="row">
  <div class="col-lg-8">
    <div class="mb-3">
  <label for="judul" class="form-label">Judul</label>
  <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Masukkan judul" name="title" value="{{ old('title') }}" required>
  @error('title')
    <div class="small text-danger">
        {{ $message }}
      </div>
    @enderror
</div>
    <div class="mb-3">
  <label for="slug" class="form-label">Slug</label>
  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Slug akan dibuat secara otomatis" name="slug" value="{{ old('slug') }}" required>
  @error('slug')
    <div class="small text-danger">
        {{ $message }}
      </div>
    @enderror
</div>
    <div class="mb-3">
  <label for="category" class="form-label">Kategori</label>
<select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
  @foreach( $categories as $category )
  <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? "selected" : "" }} >{{ $category->name }}</option>
  @endforeach
</select>
@error('category_id')
    <div class="small text-danger">
        {{ $message }}
      </div>
    @enderror
</div>
<div class="mb-3">
  <label for="image" class="form-label">Gambar Postingan</label>
  <img alt="Preview Image" style="display:none; width:200px;" class="mb-2 img-fluid img-preview">
  <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
  @error('image')
    <div class="small text-danger">
        {{ $message }}
      </div>
    @enderror
</div>

    <div class="mb-3">
  <label for="category" class="form-label">Body</label>
    @error('body')
    <div class="small text-danger">
        {{ $message }}
      </div>
    @enderror
<input id="body" type="hidden" name="body" value="{{ old('body') }}" required>
  <trix-editor input="body"></trix-editor>
</div>
  </div>
</div>
</form>

<script>
  document.addEventListener("trix-file-accept", function(event) {
  event.preventDefault();
});

document.querySelector("#judul").addEventListener("input",(e)=>{
  const slug = e.target.value.toLowerCase()
    .trim()
    .replace(/[^\w\s-]/g, '')
    .replace(/[\s_-]+/g, '-')
    .replace(/^-+|-+$/g, '');
  document.querySelector("#slug").value = slug
})

function previewImage(){
  const input = document.querySelector("#image")
  const img = document.querySelector(".img-preview")
  
  img.style.display="block"
  const oFReader = new FileReader()
  oFReader.readAsDataURL(input.files[0])
  oFReader.onload = event => {
    img.src = event.target.result
  }
}
</script>
@endsection
