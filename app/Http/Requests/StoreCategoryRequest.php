<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories,name',
        ];
        if ($this->input('parent_id') != 0) {
            $rules['parent_id'] = 'exists:categories,id';
        }
        return $rules;
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'name.unique' => 'Danh mục này đã tồn tại.',
            'parent_id.exists' => 'Danh mục này không tồn tại.',

        ];
    }
}
