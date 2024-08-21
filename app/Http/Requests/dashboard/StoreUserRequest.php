<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name' => 'required|alpha|min:3|max:100',
            'last_name' => 'required|alpha|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|max:12|unique:users,phone',
            'password' => 'required|min:8',
            'status' => 'required',
            'role' => 'required',
            'gender' => 'required|in:male,female',
        ];
    }
}
