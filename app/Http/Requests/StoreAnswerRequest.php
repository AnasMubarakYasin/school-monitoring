<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerRequest extends FormRequest
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
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,docx|max:5048',
            'material_and_assignment_id' => 'required|integer',
            // 'status' => 'nullable|in:not checked yet,have been checked,repair',
            // 'description' => 'nullable|string',
        ];
    }
}
