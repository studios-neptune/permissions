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
    <x-cerberus::permission.group.form
        :permissions="$permissions"
        :entity="$entity"
    ></x-cerberus::permission.group.form>
    @if (!$readOnly)
        <div class="form__actions">
            <x-button.primary>{{ __('Save') }}</x-button.primary>
        </div>
    @endif
</form>
