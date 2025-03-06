<!-- diary/create.blade.php -->
@extends('layouts.app')

@section('content')
<form hx-post="{{ route('diary.store') }}"
      hx-target="#diary-list"
      hx-swap="beforeend"
      hx-on::after-request="this.reset()"
      class="card shadow-lg p-4 mx-auto"
      style="max-width: 500px; border-radius: 10px;">

    @csrf
    <h3 class="text-center text-primary mb-3 fw-bold">Create a New Diary Entry</h3>

    <div class="mb-3">
        <label for="title" class="form-label fw-bold">Title</label>
        <input type="text" name="title" id="title" class="form-control border-primary shadow-sm"
               placeholder="Enter title" required>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label fw-bold">Content</label>
        <textarea name="content" id="content" class="form-control border-primary shadow-sm"
                  rows="4" placeholder="Write your thoughts..." required></textarea>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success w-100 fw-bold shadow">Create Diary Entry</button>
    </div>
</form>
@endsection