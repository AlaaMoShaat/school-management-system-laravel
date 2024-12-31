<?php

namespace Database\Seeders;

use App\Models\Nationality;
use App\Models\Religion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BloodSeeder::class);
        $this->call(NationalitySeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(FeeTypeSeeder::class);
        $this->call(SettingSeeder::class);
    }
}