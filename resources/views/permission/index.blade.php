@extends('layout')
@php
$title = __('Permissions')
@endphp
@section('title', $title)
@section('content')
    <div class="container">
        <div class="pp--inline-heading">
            <h1 class="pp--inline-header">
                {{ $title }}
            </h1>
            <a href="{{ route('permission.create') }}">
                <x-artwork.plus></x-artwork.plus>
            </a>
        </div>
        <x-cerberus::permission.list
            :permissions="$permissions"
        ></x-cerberus::permission.list>
    </div>
@endsection
