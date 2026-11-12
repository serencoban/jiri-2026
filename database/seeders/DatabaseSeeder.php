<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Invitation;
use App\Models\Jiri;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
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
        $myriam = User::factory()->create([
            'firstname' => 'Myriam',
            'lastname' => 'Dupont',
            'email' => 'm@d.com',
        ]);
        $dominique = User::factory()->create([
            'firstname' => 'Dominique',
            'lastname' => 'Vilain',
            'email' => 'd@v.com',
        ]);
        $jiriMyriam = [
            'Design Web - Juin 2027',
            'Design Web - Aout 2026',
            'Design Web - Juin 2026',
            'Design Web - Aout 2025',
            'Design Web - Juin 2025',
        ];

        foreach ($jiriMyriam as $name) {
            Jiri::factory()->create([
                'name' => $name,
                'user_id' => $myriam->id,
            ]);
        }

        $jiriDominique = [
            'Projet Web - Juin 2027',
            'Projet Web - Aout 2026',
            'Projet Web - Juin 2026',
            'Projet Web - Aout 2025',
            'Projet Web - Juin 2025',
        ];

        foreach ($jiriDominique as $name) {
            Jiri::factory()->create([
                'name' => $name,
                'user_id' => $dominique->id,
            ]);
        }

        Contact::factory(20)->create();
        Project::factory(10)->create();
        //Task::factory(6)->create();
        Invitation::factory(2)->create();
    }

}
