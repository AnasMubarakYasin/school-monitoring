<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademicActivityRequest extends FormRequest
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
            'duration' => 'required|string',
            'executive' => 'required|string',
            'type' => 'required|string',
            'date' => 'required|date',
            'start_at' => 'required|string',
            'end_at' => 'required|string',
            'description' => 'nullable|string',
        ];
    }
}
