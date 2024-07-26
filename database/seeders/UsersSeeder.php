<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = new User();
        $newUser->name = 'Mario';
        $newUser->surname = 'Rossi';
        $newUser->email = 'mario@rossi.it';
        $newUser->date_of_birth = '2000-02-26'; 
        $newUser->password = bcrypt('ciaociao');
        $newUser->save(); 

        $newUser = new User();
        $newUser->name = 'Sofia';
        $newUser->surname = 'Ferrari';
        $newUser->email = 'sofia@ferrari.it';
        $newUser->date_of_birth = '2001-02-26'; 
        $newUser->password = bcrypt('ciaociao');
        $newUser->save(); 
    }
}
