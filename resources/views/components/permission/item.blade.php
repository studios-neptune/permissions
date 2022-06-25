@props([
'permission',
])
<div class="pp--permission">
    <div class="pp--permission__body">
        <div class="permission__item__name">{{ $permission->name }}</div>
        <span class="pp--permission__item__slug">
            {{ $permission->slug }}
        </span>
    </div>
    <div class="pp--permission__actions">
            @can('permission.view', $permission)
                <a href="{{ route('permission.show', $permission) }}" title="{{ __('View :permission', ['permission' => $permission->name]) }}">
                    <x-artwork.view></x-artwork.view>
                </a>
            @endcan
            @can('permission.update', $permission)
                <a href="{{ route('permission.edit', $permission) }}" title="{{ __('Edit :permission', ['permission' => $permission->name]) }}">
                    <x-artwork.edit></x-artwork.edit>
                </a>
            @endcan
            @can('permission.delete', $permission)
                <a href="{{ route('permission.destroy', $permission) }}"
                   data-method="DELETE"
                   data-confirm="{{__("Are you sure you want to delete :permission's account ?", ['permission' => $permission->name])}}"
                   title="{{ __("Delete permission :permission ?", ['permission' => $permission->name]) }}">
                    <x-artwork.delete></x-artwork.delete>
                </a>
            @endcan
        </div>
</div>
