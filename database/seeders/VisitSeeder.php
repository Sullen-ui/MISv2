<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visit_logs')->insert([
            ['uid' => 1,
            'id_patient' => 1,
            'id_doctor' => 1,
            'visit_date' => '05.05.2021',
            'id_branch' => 1,
            ],
          
            ]);
    }
}
