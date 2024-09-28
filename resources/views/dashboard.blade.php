@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>Welcome to your Dashboard!</h1>
                    <p>Here is the content of your dashboard.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
