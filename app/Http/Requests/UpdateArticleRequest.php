<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
			'description' => 'nullable|string',
			'type' => 'required|string',
			'quantity' => 'required|integer',
			'price' => 'required|integer',
			'discount' => 'nullable|integer',
			'artisan_id' => 'nullable|integer|exists:artisans,id',
            'category_id' => 'required|integer|exists:categories,id',
			'attributes' => 'nullable|json',
			'img_urls' => 'nullable|string',
			
        ];
    }
}