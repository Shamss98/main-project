<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Adjust this based on your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Product name is required',
            'description.required' => 'Product description is required',
            'price.required' => 'Product price is required',
            'price.numeric' => 'Product price must be a number',
            'stock.required' => 'Product stock is required',
            'stock.integer' => 'Product stock must be an integer',
            'image.image' => 'Uploaded file must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'Image size cannot exceed 2MB',
        ];
    }
}
