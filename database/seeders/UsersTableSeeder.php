<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Roberto Noya',
            'email'=> 'contato@ayt.com.br',
            'password' => bcrypt('t7s7a9r7') 
        ]);
    }
}
