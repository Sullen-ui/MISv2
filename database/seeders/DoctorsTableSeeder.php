<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            ['name' => 'Воронова Екатерина Алексеевна','dob' => '31.02.1990','prof_name' => 'Терапевт',
                'id_profession' => 4,'id_branch' => 1,'status' => 1, 'cabinet' => '101','id_user' => 2],

            ['name' => 'Алексеев Михаил Романович','dob' => '31.02.1973','prof_name' => 'Кардиолог',
                'id_profession' => 6,'id_branch' => 1,'status' => 1, 'cabinet' => '102','id_user' => 6],

            ['name' => 'Уварова Ольга Петровна','dob' => '31.02.1996','prof_name' => 'Хирург',
                'id_profession' => 7,'id_branch' => 2,'status' => 1, 'cabinet' => '115','id_user' => 4],

            ['name' => 'Петренко Мария Ивановна','dob' => '31.02.1993','prof_name' => 'Гинеколог',
                'id_profession' => 8,'id_branch' => 2,'status' => 1, 'cabinet' => '116','id_user' => 5],
            
                ['name' => 'Иванов Роман Алексеевич','dob' => '15.09.1977','prof_name' => 'Травматолог',
                'id_profession' => 2,'id_branch' => 2,'status' => 1, 'cabinet' => '117','id_user' => 7],

                ['name' => 'Головин Виктор Евгеньевич','dob' => '15.09.1968','prof_name' => 'Невролог',
                'id_profession' => 5,'id_branch' => 1,'status' => 1, 'cabinet' => '103','id_user' => 8],
            ]);
            
    }
}
