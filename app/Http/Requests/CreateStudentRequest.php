<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
            'photo'=>"nullable|string",
            'name'=>"required|string",
            'telp'=>"required|string",
            'email'=>"required|string",
            'password'=>"required|string",

            'nis'=>"required|string",
            'nisn'=>"required|string",
            'fullname'=>"required|string",
            'gender'=>"required|string",
            'grade'=>"required|string",

            'major_id'=>"required|integer",
            'classroom_id'=>"required|integer",
        ];
    }
}