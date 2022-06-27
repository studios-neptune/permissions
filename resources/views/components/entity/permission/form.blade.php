@props([
'entity',
'permissions',
'readOnly' => false,
])

@php
    use Illuminate\Support\Str;
    $entityName = basename(
        Str::of(get_class($entity))
        ->replace('\\', '/')
        ->lower()
    );
    $action= route(sprintf('%s.permission.bulk-update', $entityName), $entity);
@endphp
<form action="{{ $action }}" method="POST">
    @csrf
    @method('PUT')
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

                                    name="permissions[]" :checkbox-value="$permission->slug"
                                    :id="$permission->slug"
                                    :value="$entity->hasPermission($permission->slug)"
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
    @if (!$readOnly)
        <div class="form__actions">
            <x-button.primary>{{ __('Save') }}</x-button.primary>
        </div>
    @endif
</form>
