@extends('layouts.main')

@section('body')
    <div class="section-title d-flex justify-content-center mt-3 font-family-sans-serif">
        <h2>{{ $title }}</h2>
    </div>
        <div class="container">
        @if ($materis->count())
            <div class="row">
            @foreach($materis as $materi)
                <div class="col-md-4">
                <div class="card mb-3">
                @if($materi->image)
                    <img src="{{ asset('storage/'. $materi->image) }}" alt="{{ $materi->category->name }}" class="img-fluid">  
                @else
                <img src="https://source.unsplash.com/400x225?{{ $materi->category->slug }}" class="card-img-top" 
                alt="{{ $materi->category->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $materi->title }}</h5>
                    <p class="card-text">{{ Str::limit($materi->excerpt, 100) }}</p>
                    <a href="/materi/{{ $materi->slug }}" class="btn btn-dark">Learn More</a>
                </div>
                </div>

                </div>
        @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">Belum Ada Data.</p>
    @endif
    <div class="d-flex justify-content-center">
    {{ $materis->links() }}
</div>
@endsection