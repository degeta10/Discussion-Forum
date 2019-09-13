<?php

use App\Discussion;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # FOR DEVELOPERS
        Discussion::create([
            'name' => 'Discussion 1',
            'type' => 'Open',
            'user_id' => 1,
        ]);

        Discussion::create([
            'name' => 'Discussion 2',
            'type' => 'Open',
            'user_id' => 1,
        ]);
    }
}
