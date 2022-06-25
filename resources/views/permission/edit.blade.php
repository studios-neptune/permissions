@extends('layout')
@php
    $title = __('Edit permission - :permission', ['permission' => $permission->name])
@endphp
@section('title', $title)
@section('content')
    <div class="container">
        <div class="pp--inline-header">
            <h1 class="pp--inline-heading">
                @can('permission.viewAny')
                    <a href="{{ route('permission.show', $permission) }}">
                        <x-artwork.arrow-left></x-artwork.arrow-left>
                    </a>
                @endcan
                {{ $title }}
            </h1>
        </div>
        <x-cerberus::permission.form
                :action="route('permission.update', $permission)"
                method="PUT"
            :permission="$permission"
        ></x-cerberus::permission.form>
    </div>
@endsection
