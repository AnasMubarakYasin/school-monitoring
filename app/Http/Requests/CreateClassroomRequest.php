<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClassroomRequest extends FormRequest
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
            'code' => 'required|string',
            'name' => 'required|string',
            'total_student' => 'nullable|integer',
            'description' => 'nullable|string',

            'major_id' => 'required|integer',
            'homeroom_id' => 'required|integer',
        ];
    }
}
