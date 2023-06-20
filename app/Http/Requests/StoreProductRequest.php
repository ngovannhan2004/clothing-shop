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
        $rules = [
            'name' => 'required|unique:products,name',
        ];
        if ($this->input('category_id') != 0) {
            $rules['category_id'] = 'exists:categories,id';
        }
        return $rules;
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'name.unique' => 'Sản Phẩm này đã tồn tại.',
            'category_id.exists' => 'Sản Phẩm này không tồn tại.',
        ];
    }
}
