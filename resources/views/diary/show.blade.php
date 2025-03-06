@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4 w-50">
        <div class="card-body text-center">
            <h1 class="card-title text-primary">{{ $diary->title }}</h1>
            <hr>
            <p class="card-text text-secondary" style="white-space: pre-wrap;">{{ $diary->content }}</p>
            <div class="mt-4">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
