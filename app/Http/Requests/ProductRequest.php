<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use MyLibrary;
class ProductRequest extends FormRequest
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
        $list_cate=MyLibrary::getKeyCategory();
        return [
            'name'=>'required',
            'category'=>'in:'.$list_cate,
            'price'=>'required',
            'sale'=>'required',
            'desc'=>'required',
            'status'=>'in:1,2',
            'image'=>'mimes:jpeg,jpg,png|max:500000'
        ];
    }
    public function message()
    {
        return [
            'name.required'=>'Chưa nhập tên sản phẩm',
            'category.in'=>'Loại sản phẩm k hợp lệ',
            'price.required'=>'Bạn chưa nhập giá',
            'sale.required'=>'Bạn chưa nhập giá khuyến mãi, để 0 nếu là sp k khuyến mãi',
            'desc.required'=>'Bạn chưa nhập mô tả',
            'status.in'=>'Trạng thái không hợp lệ',
            'image.mimes'=>'Chỉ được upoad file: jpeg,jpg,png',
            'image.max'=>'File upload k được quá 50MB'
        ];
    }
}
