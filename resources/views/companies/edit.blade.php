@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Company</h1>
    <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $company->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $company->email) }}">
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
            <input type="url" class="form-control" id="website" name="website" value="{{ old('website', $company->website) }}">
            @error('website')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Company</button>
    </form>
</div>
@endsection
