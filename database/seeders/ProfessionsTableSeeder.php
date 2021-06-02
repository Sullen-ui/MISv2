<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


            DB::table('professions')->insert([
            ['name' => 'Хирург-онколог'],
            ['name' => 'Травматолог'],
            ['name' => 'Эндокринолог'],
            ['name' => 'Терапевт'],
            ['name' => 'Невролог'],
            ['name' => 'Кардиолог'],
            ['name' => 'Хирург'],
            ['name' => 'Гинеоколог'],
            ['name' => 'Гастроэнтеролог'],
            ['name' => 'Уролог'],
            ['name' => 'Оториноларинголог'],
            ['name' => 'Инфекционист'],
            ['name' => 'Нарколог'],
            ['name' => 'Окулист'],
            ['name' => 'Психиатр'],
            ['name' => 'Нефролог'],
            ['name' => 'Дерматовенеролог'],


            
            ]);
    }
}
