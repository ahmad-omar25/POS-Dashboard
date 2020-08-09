<?php

namespace App\Http\Requests\Dashboard\Products;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'ar.name' => 'required|unique:product_translations,name',
            'en.name' => 'required|unique:product_translations,name',
            'ar.description' => 'required',
            'en.description' => 'required',
            'category_id' => 'required',
         //   'image' => 'required|mimes:jpg,jpeg,png',
            'purchase_price' => 'required|integer',
            'sale_price' => 'required|integer',
            'stock' => 'required|integer',
        ];
    }
}
