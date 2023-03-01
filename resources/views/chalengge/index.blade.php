@extends('layouts.main')

@section('body')
    
<div class="section-title d-flex justify-content-center mt-3 font-family-sans-serif">
    <h2>Chalengges</h2>
</div>
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <h4><span class="badge bg-dark text-light">{{ $category->name }}</span></h4>
                @foreach($category->category_chalengges as $chalengge)
                    <div class="col-md-4" id="card-chalengge">
                    <a href="/chalengge/{{ $chalengge->slug }}">
                    <div class="mb-4 flex-column {{ app\Http\Controllers\ChalenggeController::finished($chalengge->id) ? 'cardfinished' : 'cardcategory' }}">
                        <h5>{{ $chalengge->name }}</h5>
                        <p>{{ $chalengge->point  }}</p>
                    </div>
                    </a>
                    </div>    
                    @endforeach
                @endforeach
            </div>
        </div>
@endsection