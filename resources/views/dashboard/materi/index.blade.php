@extends('dashboard.layouts.main')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">My Posts</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive col-lg-9">
      <a href="/dashboard/materi/create" class="btn btn-primary mb-3">Upload Materi</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($materis as $materi)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $materi->title }}</td>
              <td>{{ $materi->category->name }}</td>
              <td>
                <a href="/dashboard/materi/{{ $materi->slug }}" class="badge bg-info"><i class="bi bi-eye-fill"></i></a>
                <a href="/dashboard/materi/{{ $materi->slug }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                <form action="/dashboard/materi/{{ $materi->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onClick="return confirm('Yakin Ingin Menghapus?')"><i class="bi bi-eraser-fill"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection