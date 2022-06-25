<?php

namespace Neptune\Domains\Permissions\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'group' => 'nullable|string',
            'slug' => 'string',
        ];
    }
}
