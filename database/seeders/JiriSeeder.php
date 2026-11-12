<?php

namespace Database\Seeders;

use App\Models\Jiri;
use http\Client\Curl\User;
use Illuminate\Database\Seeder;

class JiriSeeder extends Seeder
{
    public function run(): void
    {
        $user= \App\Models\User::first();
        Jiri::create([
            'name' => 'Design Web - Juin 2027',
            'date' => '2027-06-15',
            'begins_at' => '08:30',
            'ends_at' => '17:30',
            'status' => 'upcoming',
            'user_id'=>$user->id,
        ]);
    }
}
