@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Company</h1>
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo">
            @error('logo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" class="form-control" id="website" name="website">
            @error('website')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Company</button>
    </form>
</div>
@endsection
