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
        $user->name='Ferid';
        $user->lastname='Əliyev';
        $user->fathername='Əli';
        $user->username='user1';
        $user->position='Qeydiyyatchi';
        $user->phoneNumber='0509339696';
        $user->password = bcrypt('123456');

        $user->save();

        $superadmin = new User();
        $superadmin->name='Samir';
        $superadmin->lastname='Teymurov';
        $superadmin->fathername='Terlan';
        $superadmin->username='superadmin';
        $superadmin->key='superadmin';
        $superadmin->position='Qeydiyyatchi';
        $superadmin->phoneNumber='0509339697';
        $superadmin->password = bcrypt('#admin123');
        $superadmin->save();
    }
}
