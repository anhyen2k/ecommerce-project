<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users,email,'.$this->id.'|max:191',
            'name' => 'required|string',
            'user_catalogue_id' => 'required|gt:0',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email.',
            'name.required' => 'Vui lòng nhập họ tên.',
            'name.string' => 'Vui lòng nhập họ tên ở dạng kí tự.',
            'user_catalogue_id.gt' => 'Vui lòng chọn một nhóm thành viên',
            'email.email' => 'Email chưa đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'email.max' => 'Độ dài tối đa là 191 kí tự',
        ];
    }
}
