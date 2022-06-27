@extends('layout')
@section('title', __('Role :role', ['role' => $role->name]))
@section('content')
    <div class="container">
        <h1 class="pp--inline-header">
            <a href="{{ route('role.show', $role) }}">
                <x-artwork.arrow-left></x-artwork.arrow-left>
            </a>
            @yield('title')
        </h1>
        <x-cerberus::role.form
            :action="route('role.update', $role)"
            :role="$role"
        ></x-cerberus::role.form>
    </div>
@endsection
