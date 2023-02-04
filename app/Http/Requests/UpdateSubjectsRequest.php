<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectsRequest extends FormRequest
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
            'level' => 'required|string',
            'major_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'description' => 'required|string',
        ];
    }
}
