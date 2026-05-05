<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Inscription, User};


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      Inscription::factory()->count(50)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',

        ]);
        $this->call([
    en_caderement::class,
]);
    }
}

