<!-- resources/views/profile/show.blade.php -->
@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <h1>{{ $user->name }}'s Profile</h1>
    <p>Email: {{ $user->email }}</p>
    <!-- أضف المزيد من تفاصيل المستخدم هنا -->
</div>
@endsection
