@extends('dashboard.layouts.main')

@section('body')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">

            <h2>{{ $materi->title }}</h2>

                <a href="/dashboard/materi" class="btn btn-success mb-1"><span data-feather="arrow-left" class="align-text-bottom"></span>Back To My Post</a>
                <a href="/dashboard/materi/{{ $materi->slug }}/edit" class="btn btn-warning mb-1"><span data-feather="edit" class="align-text-bottom"></span>Edit</a>
                <form action="/dashboard/materi/{{ $materi->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger mb-1" onClick="return confirm('Yakin Ingin Menghapus?')"><span data-feather="x-circle" class="align-text-bottom"></span> Delete</button>
                </form>

                @if($materi->image)
                <div style="max-height: 350px"; overflow:hidden;>
                    <img src="{{ asset('storage/'. $materi->image) }}" alt="{{ $materi->category->name }}" class="img-fluid">  
                </div> 
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $materi->category->name }}" alt="{{ $materi->category->name }}"
                    class="img-fluid">
                @endif
                <article class="my-3 fs-5">
                    {!! $materi->body !!}
                </article>
        </div>
    </div>
</div>
@endsection