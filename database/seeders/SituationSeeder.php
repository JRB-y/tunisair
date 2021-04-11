<?php

namespace Database\Seeders;

use App\Models\Situation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Situation $situation)
    {
        $situations = [
            "Single",
            "Married",
            "Divorced",
            "Widow(er)"
        ];

        foreach ($situations as $sit) {
           $situation->create([
               'label' => $sit
           ]);
        }
    }
}
