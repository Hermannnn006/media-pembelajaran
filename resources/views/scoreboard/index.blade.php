@extends('layouts.main')

@section('body')
<div class="section-title d-flex justify-content-center mt-3 font-family-sans-serif">
        <h2>{{ $title }}</h2>
    </div>
        <div class="container">
            <div class="d-flex justify-content-center">
            <div class="table col-md-8">
            <table class="table table-striped table-lg">
            <thead>
                <tr>
                <th scope="col">Place</th>
                <th scope="col">Name</th>
                <th scope="col">Point</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->nilai }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div> 
            </div> 
        </div>
@endsection