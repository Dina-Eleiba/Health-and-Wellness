<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'weight_unit' => 'required',
            'description' => 'required|string',
            'image' => 'mimes:jpg,jpeg,png',
            'category_id' => 'required|integer',
            'brand_id' => 'nullable',
            'status' => 'required|in:available,unavailable,sold out',
        ];
    }
}
