@extends('layout')
@section('title', __('Roles'))
@section('content')
    <div class="container">
        <div class="pp--inline-heading">
            <h1 class="pp--inline-header">
                @yield('title')
            </h1>
            <a href="{{ route('role.create') }}">
                <x-artwork.plus></x-artwork.plus>
            </a>
        </div>
        <x-cerberus::role.list
            :roles="$roles"
        ></x-cerberus::role.list>
    </div>
@endsection
