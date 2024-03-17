<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLanguageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'canonical' => 'required|unique:languages,canonical,'.$this->id.'',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên ngôn ngữ.',
            'canonical.required' => 'Vui lòng nhập canonical.',
            'canonical.unique' => 'Từ khóa đã tồn tại, hãy chọn từ khóa khác.',
        ];
    }
}
