@extends('layouts.app')

@section('title', 'Companies')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2>Companies</h2>
            <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Create Company</a>

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->description }}</td>
                            <td>{{ $company->address }}</td>
                            <td>{{ $company->phone }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Company Actions">
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No companies found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
