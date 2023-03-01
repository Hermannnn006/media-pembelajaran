@extends('dashboard.layouts.main')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Welcome, {{ auth()->user()->name }}</h1>
    </div>
    <div class="col-md-4">
    <div class="card text-white bg-primary mb-3">
        <div class="card-header">Chalengges Solved</div>
        <div class="card-body">
        <p><span class="badge bg-secondary">Points {{ $users[0]->nilai }}</span></p>
        <p class="card-text">@if ($users[0]->chalengges->count())
        <ul>
        @foreach($users[0]->chalengges as $chalengge)
            <li>{{ $chalengge->name . " - " . $chalengge->pivot->created_at->diffForHumans() }}</li>
        @endforeach
        </ul>
        @else
            <p>No Chalengges Solved.</p>
        @endif
        </p>
    </div>
    </div>

@endsection