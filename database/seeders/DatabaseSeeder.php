<?php

namespace Database\Seeders;

use App\Models\AllSelectBox;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ImzalayanShexsSeeder::class);
        $this->call(AllSelectBoxesSeeder::class);
    }
}
