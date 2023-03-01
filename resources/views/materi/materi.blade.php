@extends('layouts.main')

@section('body')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2>{{ $materi->title }}</h2>
                <img src="https://source.unsplash.com/1200x400/?{{ $materi->category->name }}" alt=""
                class="img-fluid">
                <p class="mt-2">
                <a href="/materi?category={{ $materi->category->slug }}" class="text-decoration-none"><span class="badge bg-secondary">
                {{ $materi->category->name }}</span></a>
                </p>
                <article class="my-3 fs-5">
                    {!! $materi->body !!}
                </article>

            <a href="/materi?category={{ $materi->category->slug }}" class="text-decoration-none">Back</a>

        </div>
    </div>
</div>

@endsection