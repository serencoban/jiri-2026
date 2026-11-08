<?php

namespace Database\Seeders;

use App\Models\Jiri;
use Illuminate\Database\Seeder;

class JiriSeeder extends Seeder
{
    public function run(): void
    {
        Jiri::create([
            'name' => 'Design Web - Juin 2027',
            'date' => '2027-06-15',
            'begins_at' => '08:30',
            'ends_at' => '17:30',
            'status' => 'upcoming',
        ]);
    }
}
