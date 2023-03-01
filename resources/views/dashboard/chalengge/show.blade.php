@extends('dashboard.layouts.main')

@section('body')

<div class="container">
    <div class="row mb-5">
        <div class="col-md-8 mt-3">
        <a href="/dashboard/chalengge" class="btn btn-success mb-1"><i class="bi bi-arrow-left-circle"></i>Back</a>
                <a href="/dashboard/chalengge/{{ $chalengge->slug }}/edit" class="btn btn-warning mb-1"><i class="bi bi-pencil-square"></i></span>Edit</a>
                <form action="/dashboard/chalengge/{{ $chalengge->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger mb-1" onClick="return confirm('Yakin Ingin Menghapus?')"><i class="bi bi-eraser"></i> Delete</button>
                </form>        
                <h2>{{ $chalengge->name }}</h2>
                <article class="my-3 fs-5">
                    {!! $chalengge->description !!}
                </article>
                <div class="col-md-6">
                <form action="/chalengge/{{ $chalengge->slug }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Input Flag" name="answer">
                        <button class="btn btn-secondary ms-1" type="submit" id="submit">Submit</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>

@endsection