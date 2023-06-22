<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student($row);
    }

    public function rules(): array
    {
        return [
            'photo' => "nullable|image",
            'name' => "required|string",
            'telp' => "nullable|string",
            'email' => "nullable|string",
            'password' => "required|string",

            'nis' => "required|string",
            'nisn' => "required|string",
            'fullname' => "required|string",
            'gender' => "required|string",
            'grade' => "required|string",

            'major_id' => "required|integer",
            'classroom_id' => "required|integer",
        ];
    }
}
