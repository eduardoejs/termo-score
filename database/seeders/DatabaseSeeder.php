<?php

namespace Database\Seeders;

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

        \App\Models\User::factory()->create([
            'name' => 'Eduardo Silva',
            'email' => 'edu@mail.com',
            'admin' => true,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Vitor Silva',
            'email' => 'vitor@mail.com',            
        ]);
    }
}
