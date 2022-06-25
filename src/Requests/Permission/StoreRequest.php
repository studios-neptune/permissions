<?php

namespace Neptune\Domains\Permissions\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'group' => 'nullable|string',
            'slug' => 'nullable|string',
        ];
    }
}
