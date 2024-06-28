@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
            <p class="card-text">Company: {{ $employee->company->name }}</p>
            <p class="card-text">Email: {{ $employee->email }}</p>
            <p class="card-text">Phone: {{ $employee->phone }}</p>
            <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
