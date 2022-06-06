<?php

namespace Database\Seeders;

use App\Models\DailyScore;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        $eduardo = User::factory()->create([
            'name'  => 'Eduardo Silva',
            'email' => 'edu@mail.com',
            'admin' => true,
        ]);

        $vitor = User::factory()->create([
            'name'  => 'Vitor Silva',
            'email' => 'vitor@mail.com',
        ]);

        // DailyScore::factory()->for($eduardo, 'user')->count(20)->create();
        // DailyScore::factory()->for($vitor, 'user')->count(20)->create();
    }
}
