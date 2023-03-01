@extends('dashboard.layouts.main')

@section('body')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Chalengge</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/chalengge" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Chalengge Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
        <label for="category" class="form-label">Chalengge Category</label>
        <select class="form-select" name="category_id">
            @foreach($categories as $category)
            @if(old('category_id') == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
            @endforeach
        </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Chalengge Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required value="{{ old('description') }}">
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Chalengge Answer</label>
            <input type="text" class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" required value="{{ old('answer') }}">
            @error('answer')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="point" class="form-label">Chalengge Point</label>
            <input type="text" class="form-control @error('point') is-invalid @enderror" id="point" name="point" required value="{{ old('point') }}">
            @error('point')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="link" class="form-label">Chalengge Link</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" required value="{{ old('link') }}">
            @error('link')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Chalengge</button>
    </form>
</div>
@endsection