<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'photo' => 'nullable|string',
            'name' => 'required|string',
            'telp' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',

            'nip' => 'required|string',
            'fullname' => 'required|string',
            'gender' => 'required|in:male,female',
            'state' => 'required|in:honor,pns',
            'task' => 'required|string',
        ];
    }
}
