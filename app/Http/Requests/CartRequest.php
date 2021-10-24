<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CartRequest extends FormRequest
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
            'products' => 'required|array',
            'products.*' => ['required', 'string', Rule::in(array_column(config('constants.products'), 'type')),
            ],
        ];
    }
    public function messages()
    {
        return [
            'products.required' => trans("invoice.attributes.products.required"),
            'products.array' => trans("invoice.attributes.products.array"),
            'products.*.in' => trans("invoice.attributes.products.not_found"),
        ];
    }

}
