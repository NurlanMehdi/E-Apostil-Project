<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name='Apostil Admin';
        $user->username='apostil';
        $user->email='apostil@gmail.com';
        $user->password = bcrypt('123456');
       // $user->password = bcrypt('!;T<ur2tMUC"FbE6');


        $user->save();
    }
}
