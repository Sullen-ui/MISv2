<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ass = '<h4 style="width: 100%; text-align: center;">Первичный осмотр <span id="post-prof"></span> </h4>
        <table style="WIDTH: 100%">
            <tbody><tr>
                <td style="width: 70%;"><b>№ И.Б.</b>: <span id="post-temp_id"></span> </td>
                <td style="width: 30%;"><b>Дата</b>:  <span id="post-temp_date"></span></td>
            </tr>
            <tr>
                <td style="width: 70%;"><b>Ф.И.О.</b>:  <span id="post-temp_name"></span></td>
                <td style="width: 30%;"><b>Время</b>:  <span id="post-temp_time"></span></td>
            </tr>
        </tbody></table>
        <div><b>Дата рождения</b>:  <span id="post-temp_born"></span></div>
        <div><b>Арт. давление</b>:       <b>ЧСС</b>:       <b>t тела</b>: 36,6 </div>
        <div><b>Жалобы</b>:  </div>
        <div><b>Аnamnesis morbi</b>:  </div>
        <div><b>Аnamnesis vitae</b>:  </div>
        <div><b>Данные объективного исследования</b>:  </div>
        <div><b>Данные локального исследования</b>:  </div>
        <div><b>Данные доп. методов исследования</b>:  </div>
        <div><b>Диагноз по МКБ</b>:  </div>
        <div><b>Обоснование диагноза</b>:  </div>
        <div><b>План обследования</b>:  </div>
        <div style="margin-bottom:20px"><b>План лечение</b>:  </div>
        <table style="width:100%">
            <tbody><tr>
                <td style="width:70%"><b>Врач: <span id="doc-name"></span></b>  </td>
                <td style="width:30%">__________________</td>
            </tr>
        </tbody></table>';



        DB::table('templates')->insert([
            ['id_doctor' => 1,
            'template' => $ass,
            'name' => 'Осмотр врача',
            'id_branch' => 1],
            ]);
    }
}
