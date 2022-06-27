<?php

namespace Neptune\Domains\Permissions\Requests\Role;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $Role = config('neptune-permissions.models.role');

        return [
            'name' => [
                'required',
                'string',
            ],
            'slug' => [
                'required',
                'string',
                Rule::unique($Role)->ignore($this->role),
            ],
            'permissions' => [
                'required',
                'array',
            ],
        ];
    }
}
