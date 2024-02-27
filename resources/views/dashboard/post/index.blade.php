@extends('dashboard.layouts.main')
@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Postingan Saya</h1>
        <a href="/dashboard/post/create" class="btn btn-primary"><i class="bi bi-plus"></i>Buat Postingan</a>
      </div>
               @if(session()->has("status"))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session("status") }}!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      @endif
              <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Kategori</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $post)
            <tr>
              <td>{{ ($data->currentpage()-1) * $data->perpage() + $loop->index + 1 }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
                <form action="/dashboard/post/{{ $post->slug }}" method="post">
              <td class="d-flex flex-wrap justify-content-around gap-1">
                <a href="/dashboard/post/{{ $post->slug }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                <a href="/dashboard/post/{{ $post->slug }}/edit" class="badge bg-warning"><i class="bi bi-pen"></i></a>
                  @method('delete')
                  @csrf
                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash"></i></button>
              </td>
                </form>
            </tr>
            @endforeach
           
          </tbody>
        </table>
        {{ $data->links() }}
      </div>
@endsection
