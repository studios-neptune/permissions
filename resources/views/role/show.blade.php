@extends('layout')
@section('title', __('Role :role', ['role' => $role->name]))
@section('content')
    <div class="container">
        <div class="pp--inline-heading">
            <h1 class="pp--inline-header">
                <a href="{{ route('role.index') }}">
                    <x-artwork.arrow-left></x-artwork.arrow-left>
                </a>
                @yield('title')
            </h1>
            <a href="{{ route('role.edit', $role) }}">
                <x-artwork.edit></x-artwork.edit>
            </a>
        </div>
        <x-cerberus::role.item
            :role="$role"
        ></x-cerberus::role.item>
    </div>
@endsection
