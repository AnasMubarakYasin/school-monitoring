<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleOfSubjectsRequest extends FormRequest
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
            'class_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'day' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'description' => 'nullable|string',
        ];
    }
}
