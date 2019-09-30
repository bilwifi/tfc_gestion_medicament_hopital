<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPrescriptionRequest extends FormRequest
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
            'idordonnances' => 'required|exists:ordonnances',
            'idmedicaments' => 'required|exists:medicaments',
            'quantite' => 'required|numeric',
            'description' => 'required|string',
        ];
    }
}
