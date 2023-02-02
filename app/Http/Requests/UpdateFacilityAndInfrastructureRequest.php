<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFacilityAndInfrastructureRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'amount' => 'required|integer',
            'condition' => 'required|in:Baik,Sedang,Tidak Baik',
            'sarana_prasarana' => 'required|string',
            'responsible_person' => 'required|string',
            'description' => 'required|string',
        ];
    }
}
