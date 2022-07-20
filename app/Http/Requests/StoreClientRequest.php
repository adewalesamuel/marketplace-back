<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'name' => 'required|string',
			'email' => 'required|string|unique:clients',
			'password' => 'required|string',
			'phone' => 'required|string|unique:clients',
			'country' => 'nullable|string',
			'city' => 'nullable|string',
			'address' => 'nullable|string',
			'is_active' => 'nullable|boolean',
			'img_url' => 'nullable|string',			
        ];
    }
}