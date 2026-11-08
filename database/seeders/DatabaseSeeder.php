<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $this->call([
//            JiriSeeder::class,
//            ContactSeeder::class,
//            ProjectSeeder::class,
//        ]);

        Contact::factory(20)->create();
        Project::factory(10)->create();
        Jiri::factory(5)->create();
    }
}
