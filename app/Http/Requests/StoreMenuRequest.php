<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'name' => 'required|unique:menus,name',
        ];
        if ($this->input('parent_id') != 0) {
            $rules['parent_id'] = 'exists:menus,id';
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'name.unique' => 'Menu này đã tồn tại.',
            'parent_id.exists' => 'Menu này không tồn tại.',
        ];
    }
}
