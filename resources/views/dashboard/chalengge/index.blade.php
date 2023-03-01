@extends('dashboard.layouts.main')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">My Chalengge</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-10" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive col-lg-10">
      <a href="/dashboard/chalengge/create" class="btn btn-primary mb-3">Upload chalengge</a>
        <table class="table table-striped table-md">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Chalengge Name</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($chalengges as $chalengge)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $chalengge->name }}</td>
              <td>{{ $chalengge->category_chalengge->name }}</td>
              <td>
                <a href="/dashboard/chalengge/{{ $chalengge->slug }}" class="badge bg-info"><i class="bi bi-eye-fill"></i></a>
                <a href="/dashboard/chalengge/{{ $chalengge->slug }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                <form action="/dashboard/chalengge/{{ $chalengge->slug }}" method="post" class="d-inline">
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