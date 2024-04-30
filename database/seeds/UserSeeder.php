<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newAdmin = new User();
        $newAdmin->email = 'procidaislandapp@gmail.com';
        $newAdmin->password = Hash::make('851989');
        $newAdmin->name = 'Barone';
        $newAdmin->save();
    }
}
