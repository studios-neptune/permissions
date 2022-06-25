@props([
'permissions'
])

@if ($permissions->isEmpty())
    <p class="pp--card pp--card__center">
        {{ __('No permissions found.') }}
    </p>
@else
    <div class="pp--permission__list">
        @foreach ($permissions->groupBy('group') as $group => $ps)
            <div class="pp--permission__list-group">
                <h3>{{ $group }}</h3>
                @foreach ($ps as $permission)
                    <x-cerberus::permission.item
                            :permission="$permission"
                    ></x-cerberus::permission.item>
                @endforeach
            </div>
        @endforeach
    </div>

    {{ method_exists($permissions, 'links') ? $permissions->withQueryString()->links() : '' }}
@endif
