<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
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
        return [
            'tendmt' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'tendmt.required' => 'Vui lòng nhập tên danh mục',
            'tendmt.min' => 'Tên danh mục ít nhất phải 5 ký tự'
        ];
    }
}
