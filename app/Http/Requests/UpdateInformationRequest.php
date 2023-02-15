<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformationRequest extends FormRequest
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
            'npsn' => 'required|string',
            'nss' => 'nullable|string',
            'status' => 'required|in:Negeri,Swasta,Madrasah,Homeschooling',
            'address' => 'required|string',
            'village' => 'required|string',
            'sub_district' => 'required|string',
            'district' => 'required|string',
            'province' => 'required|string',
            'postal_code' => 'required|string',
            'telp' => 'required|string',
            'website' => 'nullable|string',
        ];
    }
}
