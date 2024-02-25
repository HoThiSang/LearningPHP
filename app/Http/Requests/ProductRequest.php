<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required|min:6',
            'product_price' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Trường :attribute bắt buộc nhập',
            'product_name.min' => 'Trường :attribute không được nhỏ hơn :min ký tự', // Nó sẽ hiển thị số lượng ký tự là 6 bởi vì nó sẽ lấy từ min ở trên như chúng ta đã qđ
            'product_price.required' => 'Trường :attribute  bắt buộc là phải nhập',
            'product_price.integer' => 'Trường :attribute phải là số',
        ];
    }

    public function attributes()
    {
        return [
            'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm'
        ];
    }

    public function withValidator($validator){
        $validator->after(function($validator){
           if($validator->errors()->count()>0){
            $validator->errors()->add('msg', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');
           }
           dd('Ok');
        });
    }

    public function prepareForValidation(){
       $this->merge([
        'create_at'=> date('Y-m-d H:i:s')
       ]);
    }

    public function failedAuthorization(){
      //  throw new AuthorizationException('Bạn không có quyền truy cập');
    throw new HttpResponseException(redirect('/')->with('type',)); // Làm 
    throw new HttpResponseException(redirect('/')->with('type',)); // Làm 
    }
}
