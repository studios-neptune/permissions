<?php

namespace Neptune\Domains\Permissions\Requests\Entity\Permission;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'permissions' => [
                'required',
                'array',
            ],
        ];
    }
}
