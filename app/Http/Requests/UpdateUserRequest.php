<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'max:191',
                Rule::unique('users')->ignore($this->id)
            ],
            'name' => 'required|string',
            'user_catalogue_id' => 'required|integer|gt:0',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập email!',
            'email.email' => 'Email chưa đúng định dạng!',
            'email.unique' => 'Email này đã tồn tại!',
            'email.max' => 'Độ dài email tối đa 191 kí tự!',
            'name.unique' => 'Email này đã tồn tại!',
            'name.required' => 'Bạn chưa nhập họ tên!',
            'name.tring' => 'Họ tên phải dạng kí tự!',
            'user_catalogue_id.gt' => 'Bạn chưa chọn nhóm thành viên!',
        ];
    }
}
