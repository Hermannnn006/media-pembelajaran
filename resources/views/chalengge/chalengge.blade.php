@extends('layouts.main')

@section('body')

<div class="container">
    <div class="row mb-5 d-flex justify-content-center">
        <div class="col-lg-12">

        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5">

                @if(session()->has('success'))
                    <div class="alert alert-success col-lg-8" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session()->has('finished'))
                    <div class="alert alert-danger col-lg-8" role="alert">
                        {{ session('finished') }}
                    </div>
                    @endif

                    @if(session()->has('wrong'))
                    <div class="alert alert-danger col-lg-8" role="alert">
                        {{ session('wrong') }}
                    </div>
                    @endif
                    
                    <h2>{{ $chalengge->name }}</h2>
                        <article class="my-3">
                            {!! $chalengge->description !!}
                            <a href="{{ $chalengge->link }}" class="btn btn-outline-dark d-block">Link</a>
                        </article>
                        <div class="col-md">
                        <form action="/chalengge/{{ $chalengge->slug }}" method="post">
                            @csrf
                            <div class="input">
                                <input type="text" class="form-control mb-1" placeholder="Input Flag" name="answer">
                                <button class="btn btn-primary mt-2" type="submit" id="submit">Submit</button>
                                <a href="/chalengge" class="btn btn-danger mt-2">Back</a>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection