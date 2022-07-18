<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSouscriptionRequest extends FormRequest
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
            'souscription_pack_id' => 'required|integer|exists:souscription_packs,id',
			'artisan_id' => 'required|integer|exists:artsans,id',
			'payment_status' => 'nullable|string',
			'payment_method' => 'required|string',
			
        ];
    }
}