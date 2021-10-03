<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Validation untuk users.update
        if ($this->route()->named('users.update')) {
            return [
                'name' => ['required', 'min:3'],
                // 'username' => ['required', 'unique:users,username,' . $this->user->id],
                // 'email' => ['required', 'email:filter', 'unique:users,email,' . $this->user->id],
                'status' => ['required', 'in:pending,active,banned'],
                'role' => ['required', 'in:admin,user']
            ];
        }
        // Validation untuk users.store
        return [
            'name' => ['required', 'min:3'],
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'unique:users,email', 'email:filter'],
            'password' => ['required', Password::min(3)],
            'status' => ['required', 'in:pending,active,banned'],
            'role' => ['required', 'in:admin,user']
        ];
    }
}
