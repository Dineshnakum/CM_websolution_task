@extends('layouts.app')

@section('content')
<style>
    nav .w-5{
        display: none;
    }
    /* .relative{
        display: none;
    } */
</style>
<div class="container">
    <h1>Companies</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add Company</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" width="50">
                        @endif
                    </td>
                    <td>{{ $company->website }}</td>
                    <td>
                        <a href="{{ route('companies.show', $company) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $companies->links() }}
    </div>
</div>
@endsection
