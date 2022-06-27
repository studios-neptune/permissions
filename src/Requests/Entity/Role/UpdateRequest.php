<?php

namespace Neptune\Domains\Permissions\Requests\Entity\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'roles' => [
                'required',
                'array',
            ],
        ];
    }
}
