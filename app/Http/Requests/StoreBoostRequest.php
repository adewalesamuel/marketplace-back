<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBoostRequest extends FormRequest
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
            'boost_pack_id' => 'required|integer|exists:boost_packs,id',
			'artisan_id' => 'required|integer|exists:artisan,id',
			'payment_status' => 'nullable|string',
			'payment_method' => 'required|string',
			
        ];
    }
}