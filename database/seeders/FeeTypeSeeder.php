<?php

namespace Database\Seeders;

use App\Models\FeeType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fee_types')->delete();

        $types = [

            [
                'en'=> 'Academic year registration fees',
                'ar'=> 'رسوم تسجيل السنة الدراسية'
            ],
            [
                'en'=> 'Single line bus fees',
                'ar'=> 'رسوم باص خط واحد'
            ],
            [
                'en'=> 'Two-line bus fees',
                'ar'=> 'رسوم باص خطين'
            ],

        ];

        foreach ($types as $t) {
            FeeType::create(['name' => $t]);
        }
    }
}