<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $uniqueEmail = 'required|users,email';
        if(session('id')){
            $id = session('id');
            $uniqueEmail =  'required|email,'. $id;
        }
           
     
        return [
            [
            'username' => 'required |min:5',
            'email' => 'required |email'. $uniqueEmail,
            'group_id' => ['required', 'integer', function ($attribute, $value, $fail) {
                if ($value == 0) {
                    $fail('Bắt buộc phải chọn nhóm');
                }
            }],
            'status' => 'required|integer'
        ]
        ];
    }

    public function messages()
    {
        return [
            'username.require' => 'Họ và tên bắt buộc phải nhập',
            'username.min' => 'Họ và tên bắt buộc phải nhập',
            'email.require' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email không tồn tại trên hệ thống ',
            'group_id.required' => 'Nhóm không được để trống',
            'group_id.integer' => 'Nhóm không hợp lệ',
            'status.required' => 'Trạng thái không được để trống',
            'status.integer' => 'Trạng thái không hợp lệ'
        ];
        
    }
}
