<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        return [
            'product_name' => 'required|string|max:255',
            'cat_id' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'code' => 'required|string|min:6',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'The product name is required.',
            'cat_id.required' => 'The category ID is required.',
            'cat_id.exists' => 'The selected category does not exist.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least :min.',
            'code.required' => 'The code is required',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least :min.',
            'description.required' => 'The description is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: :values.',
            'image.max' => 'The image may not be greater than :max kilobytes.',
        ];
    }
}
