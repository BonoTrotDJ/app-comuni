<?php

namespace Database\Seeders;

use App\Models\Comuni;
use App\Models\User;
use App\Models\Cap_comuni;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
        Comuni::factory(10)->create();
        //Cap_comuni::factory(10)->create();

        $comuni = Comuni::all();

        foreach( $comuni as $comune ) {
        Cap_comuni::factory(10)->create([
            'id_comune' => $comune->id,
        ]);
        }
    }
}
