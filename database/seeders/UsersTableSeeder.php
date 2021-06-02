<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['Login' => 'Admin','password' => Hash::make('Admin'),'type' => 0, 'id_branch' => 1],
            ['Login' => 'Doctor','password' => Hash::make('Doctor'),'type' => 1, 'id_branch' => 1],
            ['Login' => 'Registrator','password' => Hash::make('Registrator'),'type' => 2, 'id_branch' => 1],
            ['Login' => 'UvarovaOP','password' => Hash::make('UvarovaOP'),'type' => 1, 'id_branch' => 1],
            ['Login' => 'PetrenkoMI','password' => Hash::make('PetrenkoMI'),'type' => 1, 'id_branch' => 2],
            ['Login' => 'AlekseevMR','password' => Hash::make('AlekseevMR'),'type' => 1, 'id_branch' => 1],
            ['Login' => 'IvanovRA','password' => Hash::make('IvanovRA'),'type' => 1, 'id_branch' => 2],
            ['Login' => 'GolovinVE','password' => Hash::make('GolovinVE'),'type' => 1, 'id_branch' => 1],

            ]);
    }
}
