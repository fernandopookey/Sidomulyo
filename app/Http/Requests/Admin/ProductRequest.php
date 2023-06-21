<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name'              => 'required|string',
            'price'             => 'required|numeric',
            'description'       => 'required',
            'additional_info'   => 'required',
            'categories_id'     => 'required|exists:product_categories,id'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'price' => str_replace('.', '', $this->price),
        ]);
    }
}
