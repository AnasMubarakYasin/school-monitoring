<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePresenceRequest extends FormRequest
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

            'school_year_id' => 'required|integer',
            'semester_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'subjects_id' => 'required|integer',
            'classroom_id' => 'required|integer',
        ];
    }
}
