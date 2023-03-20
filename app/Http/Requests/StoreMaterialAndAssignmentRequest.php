<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaterialAndAssignmentRequest extends FormRequest
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
            'subjects_id' => 'required|integer',
            'classroom_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'type' => 'required|in:material,assignment',
            'start_at' => 'required|date',
            'end_at' => 'required|date',
            'description' => 'nullable|string',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,docx|max:5048'
        ];
    }
}
