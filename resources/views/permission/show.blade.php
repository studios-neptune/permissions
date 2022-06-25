@extends('layout')
@php
    $title = __('Permissions - :permission', ['permission' => $permission->name])
@endphp
@section('title', $title)
@section('content')
    <div class="container">
        <div class="pp--inline-header">
            <h1 class="pp--inline-heading">
                @can('permission.viewAny')
                    <a href="{{ route('permission.index') }}">
                        <x-artwork.arrow-left></x-artwork.arrow-left>
                    </a>
                @endcan
                {{ $title }}
            </h1>
        </div>
        <x-cerberus::permission.item
                :permission="$permission"
        ></x-cerberus::permission.item>
    </div>
@endsection
