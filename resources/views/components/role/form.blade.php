@props([
'action',
'permissions',
'method' => 'POST',
'role' => null,
])

<form
    action="{{ $action }}"
    method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    role="form"
    {{ $attributes }}
>
    @csrf

    @if (! in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    <x-input.text
        :label="__('role.name')"
        name="name"
        :value="old('name', data_get($role, 'name'))"
    ></x-input.text>

    <x-input.text
        :label="__('role.slug')"
        name="slug"
        :value="old('slug', data_get($role, 'slug'))"
    ></x-input.text>

    <x-cerberus::permission.group.form
        :permissions="$permissions"
        :entity="$role"
    ></x-cerberus::permission.group.form>

    <div class="form__actions">
        <x-button.primary>Save</x-button.primary>
    </div>
</form>
