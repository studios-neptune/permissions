@props([
'role',
'actions' => null,
'asForm' => false,
'body' => false,
])
<div @class(['pp--role', 'pp--role--form' => $asForm])>
    <div class="pp--role__body">
        @if ($body)
            {{ $body }}
        @else
            <span class="pp--role__item__name">{{ $role->name }}</span>
            <span class="pp--role__item__slug">
                {{ $role->slug }}
            </span>
        @endif
    </div>
    @if ($actions)
        {{ $actions }}
    @else
        <div class="pp--role__actions">
            @can('role.view', $role)
                <a href="{{ route('role.show', $role) }}" title="{{ __('View :role', ['role' => $role->name]) }}">
                    <x-artwork.view></x-artwork.view>
                </a>
            @endcan
            @can('role.update', $role)
                <a href="{{ route('role.edit', $role) }}" title="{{ __('Edit :role', ['role' => $role->name]) }}">
                    <x-artwork.edit></x-artwork.edit>
                </a>
            @endcan
            @can('role.delete', $role)
                <a href="{{ route('role.destroy', $role) }}"
                   data-method="DELETE"
                   data-confirm="{{__("Are you sure you want to delete :role?", ['role' => $role->name])}}"
                   title="{{ __("Delete role :role ?", ['role' => $role->name]) }}">
                    <x-artwork.delete></x-artwork.delete>
                </a>
            @endcan
        </div>
    @endif
</div>
