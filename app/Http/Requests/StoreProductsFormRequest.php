<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsFormRequest extends FormRequest
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
        $rules = [
            'image_products' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048'
            ],
            
            'name' => [
                'required', 
                'string', 
                'max:255'
            ],
            'description' => 'required|string|max:255',
            'atCost' => [
                'required',
                'numeric', 
                'min:0',
            ],
            'salesPrice' => [
                'required',
                'numeric', 
                'min:0',
            ],
            'quantity' => 'required|integer|min:0',
            
        ];
        /*if($this->method('PUT')){
            $rules['image_products'] = [
                'nullable',
            ]; 
        }*/
        return $rules;
    }
}