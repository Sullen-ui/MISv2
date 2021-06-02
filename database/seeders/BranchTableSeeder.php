<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('branches')->insert([
            ['name' => 'Терапевтическое отделение','Service_status' => 0,'Short_name' => 'ТО'],
            ['name' => 'Хирургическое отделение','Service_status' => 0,'Short_name' => 'ХО']
            ]);
    }
}
