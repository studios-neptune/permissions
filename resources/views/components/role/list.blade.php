@props([
'roles',
])

@if ($roles->isEmpty())
    <p class="pp--card pp--card__center">
        {{ __('No roles found.') }}
    </p>
@else
    @foreach($roles as $role)
        <x-cerberus::role.item
            :role="$role"
        ></x-cerberus::role.item>
    @endforeach
@endif
