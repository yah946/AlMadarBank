<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'=>'required|string|min:3|max:50',
            'last_name'=>'required|string|min:3|max:50',
            'username'=>'required|string|min:3|max:50|unique:users,username',
            'cin'=>'required|string|min:5|max:10|unique:users,cin',
            'date_of_birth'=>'required|date',
            'email'=>'required|string|email|unique:users,email|regex:/^[a-zA-Z0-9._%+-]{,50}@[a-zA-Z]+\.[a-zA-Z]{2,3}$/',
            'password'=>'required|confirmed|string|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$#]).{8,}$/'
        ];
    }
}
