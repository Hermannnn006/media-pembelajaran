@extends('layouts.main')

@section('body')
<section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
      <h1>Let's Learn Together</h1>
      <h2>Learn by practice of protecting critical systems and sensitive information from digital attacks.</h2>
      <div class="d-flex justify-content-center justify-content-lg-start">
        <a href="/materi" class="btn-get-started scrollto">Begin To Learn</a>
      </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
      <img src="img/hero.png" class="img-fluid animated" alt="">
    </div>
  </div>
</div>
</section>

<div class="container">
    <div class="section-title d-flex justify-content-center mt-3 font-family-sans-serif">
        <h2>LATEST MATERI</h2>
    </div>
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

@endsection