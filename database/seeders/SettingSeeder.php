<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['key' => 'academic_year', 'value' => '2024-2025'],
            ['key' => 'school_title', 'value' => 'MS'],
            ['key' => 'school_name', 'value' => 'Mohammed Shublaq International Schools'],
            ['key' => 'end_first_term', 'value' => '01-12-2024'],
            ['key' => 'end_second_term', 'value' => '01-03-2025'],
            ['key' => 'phone', 'value' => '0123456789'],
            ['key' => 'address', 'value' => 'cairo'],
            ['key' => 'school_email', 'value' => 'medo@medo.com'],
            ['key' => 'logo', 'value' => '1.jpg'],
        ];

        DB::table('settings')->insert($data);
    }
}
