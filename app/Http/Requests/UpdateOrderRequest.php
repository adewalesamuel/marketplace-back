<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'article_id' => 'required|integer|exists:articles,id',
			'client_id' => 'required|integer|exists:clients,id',
			'quantity' => 'nullable|integer',
			'price' => 'required|integer',
			'payment_status' => 'nullable|string',
			'payment_method' => 'nullable|string',
            'shipping_place' => 'string|nullable',
            'additionnal_informations' => 'string|nullable'
			
        ];
    }
}