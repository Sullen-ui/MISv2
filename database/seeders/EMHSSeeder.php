<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EMHSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('e_m_h_s')->insert([
            ['id_patient' => 1,
            'id_doctor' => 1,
            'create_date' => '05.05.2021',
            'description' => 'Здоров',
            'name' => 'Осмотр терапевта'
            ]
          
            ]);
    }
}
