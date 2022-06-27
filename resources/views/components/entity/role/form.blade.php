@props([
'entity',
'roles',
'readOnly' => false,
])

@php
    use Illuminate\Support\Str;
    $entityName = basename(
        Str::of(get_class($entity))
        ->replace('\\', '/')
        ->lower()
    );
    $action= route(sprintf('%s.role.bulk-update', $entityName), $entity);
@endphp
<form action="{{ $action }}" method="POST">
    @csrf
    @method('PUT')
    <div class="pp--roles">
        @foreach ($roles as $role)
            <x-input.checkbox
                    name="roles[]"
                    :checkbox-value="$role->slug"
                    :id="$role->slug"
                    :value="$entity->hasRole($role->slug)"
            >
                <x-slot name="label">
                    <div class="pp--role__item__name">
                        <span>{{ $role->name }}</span>
                        <span class="pp--role__item__slug">
                                    {{ $role->slug }}
                                </span>
                    </div>
                </x-slot>
            </x-input.checkbox>
        @endforeach
    </div>
    @if (!$readOnly)
        <div class="form__actions">
            <x-button.primary>{{ __('Save') }}</x-button.primary>
        </div>
    @endif
</form>
