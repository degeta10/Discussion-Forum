<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        # FOR DEVELOPERS
        User::create([
            'name' => 'Developer 1',
            'email' => 'user1@dev.com',
            'password' => Hash::make('qwe123'),
        ]);

        # FOR DEVELOPERS
        User::create([
            'name' => 'Developer 2',
            'email' => 'user2@dev.com',
            'password' => Hash::make('qwe123'),
        ]);
    }
}
