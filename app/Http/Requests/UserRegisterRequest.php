<?php

namespace App\Http\Requests;

use App\Enum\UserRoleEnum;
use App\Exceptions\ValidationFailedException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;

class UserRegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        {
            return [
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => [
                    'required',
                    Password::min(8)
                    ->letters()
                    ->numbers()
                ],
                'user_role' => ['required', new Enum(UserRoleEnum::class) ],
            ];
        }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationFailedException(json_encode($validator->errors()->all()));
    }
}
