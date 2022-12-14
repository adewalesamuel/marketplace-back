<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'artisan_id' => 'nullable|integer|exists:artisans,id|unique:pages,artisan_id',
			'content' => 'nullable|string',
			'title' => 'required|string',
            'is_active' => 'nullable|boolean'
			
        ];
    }
}