<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'prd_name' => 'required|min:4|max:40',
            'cat_id' => 'required|exists:category,cat_id',
            'prd_price' => 'required|numeric|min:0',
            'prd_image' => 'sometimes|image',
            'prd_warranty' => 'required',
            'prd_accessories' => 'required',
            'prd_new' => 'required',
            'prd_promotion' => 'required',
            'prd_status' => 'boolean|nullable',
            'prd_featured' => 'boolean|nullable',
            'prd_details' => 'required',
        ];
    }
}
