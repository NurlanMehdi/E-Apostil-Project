<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImzalayanShexsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imzalayan_shexsler = [
            'Emil Səfərov',
            'Rimma Əzimzadə',
            'Rəşad Rəhmətullayev',
            'Qurbanəli Qasımov',
            'Orxan Talıbzadə'
        ];

        foreach ($imzalayan_shexsler as $imzalayan_shexs) {
            \DB::table('imzalayan_shexsler')->insert([
                'name' => $imzalayan_shexs
            ]);
        }
    }
}
