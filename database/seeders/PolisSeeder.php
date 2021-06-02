<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PolisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('polis')->insert([
            ['name' => 'ОМС (единого образца)'],
            ['name' => 'временный ОМС'],
            ['name' => 'старого ОМС'],
            ['name' => 'ДМС'],
                      
            ]);
    }
}
