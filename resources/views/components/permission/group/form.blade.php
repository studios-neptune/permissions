@props([
'permissions',
'entity',
])

<div class="pp--permission__list">
    @foreach ($permissions->groupBy('group') as $group => $ps)
        <div class="pp--permission__list-group">
            <h4>{{ $group }}</h4>
            @foreach ($ps as $permission)
                <x-cerberus::permission.item
                    :permission="$permission"
                    as-form
                >
                    <x-slot name="actions"></x-slot>
                    <x-slot name="body">
                        <x-input.checkbox
                            name="permissions[]"
                            :checkbox-value="$permission->slug"
                            :id="$permission->slug"
                            :value="$entity ? $entity->hasPermission($permission->slug) : null"
                        >
                            <x-slot name="label">
                                <div class="pp--permission__item__name">
                                    <span>{{ $permission->name }}</span>
                                    <span class="pp--permission__item__slug">
                                        {{ $permission->slug }}
                                    </span>
                                </div>
                            </x-slot>
                        </x-input.checkbox>
                    </x-slot>
                </x-cerberus::permission.item>
            @endforeach
        </div>
    @endforeach
</div>
