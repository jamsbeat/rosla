<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create services based on the consultation types
        Service::create([
            'name' => 'Solar Panel Installation',
            'description' => 'Consultation for residential or commercial solar panel systems',
            'icon' => '☀️',
            'icon_bg_color' => 'bg-yellow-100',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Service::create([
            'name' => 'EV Charging Station',
            'description' => 'Setup and installation of electric vehicle charging solutions',
            'icon' => '🔌',
            'icon_bg_color' => 'bg-blue-100',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Service::create([
            'name' => 'Smart Home Energy',
            'description' => 'Energy efficiency and smart home management systems',
            'icon' => '🏠',
            'icon_bg_color' => 'bg-green-100',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
