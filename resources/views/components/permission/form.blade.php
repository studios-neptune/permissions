@props([
'action',
'method' => 'POST',
'permission' => null,
])

<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <x-input.text
            has-input
            name="name"
            :label="__('Name')"
            :placeholder="__('Can create user')"
            :value="old('name', $permission ? $permission->name : null)"
    ></x-input.text>
    <x-input.text
            has-input
            name="slug"
            :label="__('Slug')"
            :placeholder="__('user_create')"
            :value="old('slug', $permission ? $permission->slug : null)"
    ></x-input.text>
    <x-input.text
            has-input
            name="group"
            :label="__('Group')"
            :placeholder="__('User')"
            :value="old('group', $permission ? $permission->group : null)"
    ></x-input.text>
    <div class="form__actions">
        <x-button.primary>{{ __('Save') }}</x-button.primary>
    </div>
</form>
