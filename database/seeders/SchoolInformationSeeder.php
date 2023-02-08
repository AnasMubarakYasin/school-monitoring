<?php

namespace Database\Seeders;

use App\Models\SchoolInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolInformation::create([
            'name' => '',
            'npsn' => '',
            'nss' => '',
            'status' => 'Negeri',
            'address' => '',
            'village' => '',
            'sub_district' => '',
            'district' => '',
            'province' => '',
            'postal_code' => '',
            'telp' => '',
            'website' => '',
        ]);
    }
}
