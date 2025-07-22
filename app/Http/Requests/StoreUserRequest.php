<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users|max:191',
            'name' => 'required|string',
            'user_catalogue_id' => 'required|integer|gt:0',
            'password' => 'required|string|min:6',
            're_password' => 'required_with:password|same:password'
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
            'password.required' => 'Bạn chưa nhập mật khẩu!',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự!',
            're_password.same' => 'Mật khẩu không khớp!',
            're_password.required' => 'Bạn chưa nhập vào ô Nhập lại mật khẩu!',
        ];
    }
}
