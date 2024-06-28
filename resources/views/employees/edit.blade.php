@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name) }}" required>
            @error('first_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name) }}" required>
            @error('last_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="company_id">Company</label>
            <select class="form-control" id="company_id" name="company_id" required>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
            @error('company_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->email) }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}">
            @error('phone')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</div>
@endsection
