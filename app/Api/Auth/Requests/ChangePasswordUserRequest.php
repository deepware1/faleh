<?php

namespace App\Api\Auth\Requests;

use App\Api\Base\Requests\ApiRequest;
use Illuminate\Validation\Rules\Password;

class ChangePasswordUserRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'old_password' => ['required',Password::defaults() ],
            'new_password' => ['required', 'confirmed' ,Password::defaults() ],
        ];
    }
}
