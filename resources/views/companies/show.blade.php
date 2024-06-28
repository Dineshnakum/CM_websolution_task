@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Company Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $company->name }}</h5>
            <p class="card-text">Email: {{ $company->email }}</p>
            <p class="card-text">
                Logo:
                @if($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" width="100">
                @endif
            </p>
            <p class="card-text">Website: <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
            <a href="{{ route('companies.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
