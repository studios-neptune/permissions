@extends('layout')
@php
    $title = __('Permissions - Add')
@endphp
@section('title', $title)
@section('content')
    <div class="container">
        <div class="pp--inline-heading">
            <h1 class="pp--inline-header">
                @can('permission.viewAny')
                    <a href="{{ route('permission.index') }}">
                        <x-artwork.arrow-left></x-artwork.arrow-left>
                    </a>
                @endcan
                {{ $title }}
            </h1>
        </div>
        <x-cerberus::permission.form
            :action="route('permission.store')"
            method="POST"
        ></x-cerberus::permission.form>
    </div>
@endsection
