@extends('layout')
@section('title', __('Role - Add'))
@section('content')
    <div class="container">
        <h1 class="pp--inline-header">
            <a href="{{ route('role.index') }}">
                <x-artwork.arrow-left></x-artwork.arrow-left>
            </a>
            @yield('title')
        </h1>
        <x-cerberus::role.form
            :action="route('role.store')"
            :permissions="$permissions"
        ></x-cerberus::role.form>
    </div>
@endsection
