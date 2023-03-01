@extends('layouts.main')

@section('body')
<div class="section-title d-flex justify-content-center mt-3 font-family-sans-serif">
        <h2>Category</h2>
    </div>
<div class="container">
    <div class="row">
    @foreach($categories as $category)
        <div class="col-md-4">
        <a href="/materi?category={{ $category->slug }}">
        <div class="cardcategory mb-3">
            <h2>{{ $category->name }}</h2>
        </div>
        </a> 
     </div>
@endforeach
    </div>
</div>
@endsection